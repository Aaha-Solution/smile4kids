<?php	
	function sendOTP($otpEmail,$otp) {
		require __DIR__ . '/mail/PHPMailerAutoload.php';
        require __DIR__ . '/mail/class.phpmailer.php';
        require __DIR__ . '/mail/class.smtp.php';
 
		$message_body = "One Time Password for Smile4Kids Forgot Password Authentication is:<br/><br/>" . $otp;
		$mail = new PHPMailer();
		
		// Server settings
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = "Safrina@smile4kids.co.uk";
		$mail->Password = 'teoiljmskiwvamwh';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		
		// Recipients
		$mail->setFrom("Safrina@smile4kids.co.uk", "SMILE 4 kids");
		$mail->addAddress($otpEmail);
		
		// Content
		$mail->isHTML(true);
		$mail->Subject = "OTP for SMILE 4 kids";
		$mail->Body = $message_body;
		
		try {
			$result = $mail->send();
			error_log("Email sent successfully to: " . $otpEmail);
			return true;
		} catch (Exception $e) {
			error_log("PHPMailer Error: " . $mail->ErrorInfo);
			return false;
		}
	}
