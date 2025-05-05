<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__ . '/database/dbconfig.php';

if(isset($_POST['valmail'])){
    $valmail = $_POST['valmail'];
     
    $vemailQ = "SELECT Subr_email FROM newsletter WHERE Subr_email = '$valmail'";
    $vemailQR = mysqli_query($connection, $vemailQ);
    if (mysqli_num_rows($vemailQR) > 0) {
        
      echo 'Already Subscribed, Thank You.';
    }
}

if (isset($_POST['action']) == 'newsletter' ) {
   
    $name = $_POST['name'];
   
    $email = $_POST['email'];

    $ndate = date("d/m/Y");
  
    $emailQ = "SELECT Subr_email FROM newsletter WHERE Subr_email = '$email'";
    $emailQR = mysqli_query($connection, $emailQ);
    if (mysqli_num_rows($emailQR) > 0) {
        
      echo 'error';
    } else {
      $nQuery = "INSERT INTO newsletter (Subr_fname, Subr_email) VALUES ('$name','$email')";
      $nQRun = mysqli_query($connection, $nQuery);
      
            require './mail/PHPMailerAutoload.php';                    //PHPMailerAutoload.php
            require './mail/class.phpmailer.php';
            require './mail/class.smtp.php';
            $mail = new PHPMailer;
        
            $mail->isSendMail();
            $mail->isMail();
        
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';   //ssl tls
            $mail->Port = 465;       //465 587  
            $mail->Username   = 'Safrina@smile4kids.co.uk';                     //SMTP username
            $mail->Password   = 'teoiljmskiwvamwh'; 
            $mail->setfrom('Safrina@smile4kids.co.uk', 'SMILE 4 Kids');
        //   Recipient
            $mail->addAddress($email, $name);
            $mail->addReplyTo('Safrina@smile4kids.co.uk', 'SMILE 4 Kids');
            $mail->isHTML(true); // Set email format to HTML
        //   Content
            $mail->Subject = 'Thankyou For Subscribed Us';
            $content='<html><body><div><p>Dear ' . $name . ',<br><br> Thanks for subscribing SMILE 4 kids Indian Language School.<br><br>We will send regular updates on new courses and products.<br><br>Regards,<br>Smile 4 Kids.<br><br><a href="https://www.smile4kids.co.uk/" target="_blank">smile4kids.co.uk</a><br /><br />Unsubscribe to click <a href="https://www.smile4kids.co.uk/unsubscribe.php?unsub_email='. base64_encode($email) .'">here</a></p></div></body></html>';
            $mail->MsgHTML($content);
          
        // This should be the same as the domain of your From address
            $mail->DKIM_domain = 'smile4kids.co.uk';
        // See the DKIM_gen_keys.phps script for making a key pair -
        // here we assume you've already done that.
        // Path to your private key:
            $mail->DKIM_private = './mail/dkim_private.pem';
        // Set this to your own selector
            $mail->DKIM_selector = 'default';
        // Put your private key's passphrase in here if it has one
            $mail->DKIM_passphrase = '';
        // The identity you're signing as - usually your From address
            $mail->DKIM_identity = $mail->From;
        // Suppress listing signed header fields in signature, defaults to true for debugging purpose
            $mail->DKIM_copyHeaderFields = false;
        
          if (!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
          } else {
            
            $mail->clearAddresses();
        //   For Admin
            $mail->addaddress('regutest@outlook.com', 'Regu');     // Add a recipient
            $mail->addReplyTo('Safrina@smile4kids.co.uk', 'SMILE 4 Kids');
            $mail->isHTML(true);                                  // Set email format to HTML
        //   Content
            $mail->Subject = 'Welcome to Smile4Kids';
            $content = '<html><body><div><p>Mr/Mrs, ' . $name . '. has subscribed on  ' . $ndate . ' and their mail id is ' . $email. '</p> </div> </body></html>'; 
            $mail->MsgHTML($content);

        // This should be the same as the domain of your From address
            $mail->DKIM_domain = 'smile4kids.co.uk';
        // See the DKIM_gen_keys.phps script for making a key pair -
        // here we assume you've already done that.
        // Path to your private key:
            $mail->DKIM_private = './mail/dkim_private.pem';
        // Set this to your own selector
            $mail->DKIM_selector = 'default';
        // Put your private key's passphrase in here if it has one
            $mail->DKIM_passphrase = '';
        // The identity you're signing as - usually your From address
            $mail->DKIM_identity = $mail->From;
        // Suppress listing signed header fields in signature, defaults to true for debugging purpose
            $mail->DKIM_copyHeaderFields = false;
        
        
            if (!$mail->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                print_r($mail);
            }
          }
    }
}
?>