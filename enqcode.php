<?php
if (isset($_POST["eqsubmit"]) || isset($_POST["eqChUni"]) || isset($_POST["eqFTC"]) || isset($_POST["eqTry"])) {

    $enqName = $_POST["eqName"];
    $enqMail = $_POST["eqMail"];
    $enqPhone = $_POST["eqPhone"];
    $enqApply = $_POST["eqApply"];
    $enqMsg = $_POST["eqMsg"];

    require './mail/PHPMailerAutoload.php';                    //PHPMailerAutoload.php
    require './mail/class.phpmailer.php';
    require './mail/class.smtp.php';


    $mail = new PHPMailer;

    $mail->SMTPDebug = 0;
    $mail->isMail();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Safrina@smile4kids.co.uk';                     //SMTP username
    $mail->Password   = 'teoiljmskiwvamwh';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('Safrina@smile4kids.co.uk', 'SMILE 4 Kids');
    $mail->addAddress('sfs662001@yahoo.com', 'Safrina Saran');
    $mail->addReplyTo('Safrina@smile4kids.co.uk', 'SMILE 4 Kids');
    
    $mail->isHTML(true); // Set email format to HTML
    if (isset($_POST["eqsubmit"])) {
        $mail->Subject = 'Enquiry for D0fE ENQUIRY';
        
    } elseif (isset($_POST["eqChUni"])) {
        $mail->Subject = 'Enquiry for Children University ENQUIRY';
        
    } elseif(isset($_POST["eqTry"])) {
        $mail->Subject = 'Enquiry for TRY a Free Class ENQUIRY';
        
    }
        $mail->Body    = '<html><body><p>Name: ' . $enqName . '<br>Phone No.: ' . $enqPhone . '<br>Email: ' . $enqMail . '<br>Apply For: ' . $enqApply . '<br><strong>Message: ' . $enqMsg . '</strong></p></body></html>';
        $mail->AltBody = 'This message from ' . $enqName . ' for enquire the \"' . $enqMsg . ' \"';
        
        //This should be the same as the domain of your From address
                $mail->DKIM_domain = 'smile4kids.co.uk';
                //See the DKIM_gen_keys.phps script for making a key pair -
                //here we assume you've already done that.
                //Path to your private key:
                $mail->DKIM_private = './mail/dkim_private.pem';
                //Set this to your own selector
                $mail->DKIM_selector = 'default';
                //Put your private key's passphrase in here if it has one
                $mail->DKIM_passphrase = '';
                //The identity you're signing as - usually your From address
                $mail->DKIM_identity = $mail->From;
                //Suppress listing signed header fields in signature, defaults to true for debugging purpose
                $mail->DKIM_copyHeaderFields = false;
        
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        if (isset($_POST["eqChUni"])) {
            header("Location:childrenuniversity.php");
        } elseif (isset($_POST["eqsubmit"])) {
            header("Location:DofE.php");
        } elseif(isset($_POST["eqTry"]))  {
            header("Location:tryfreeform.php");
        }
    }
}