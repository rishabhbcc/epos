<?php

class GlobalMailer
{


	function sendMail($to,$name,$mailBody,$subject,$from,$fromName,$mail)
	{
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; 
		$mail->SMTPDebug  = 0;                               // Enable SMTP authentication
		$mail->Username = 'care@goeasypos.com';                 // SMTP username
		$mail->Password = 'care@123';                          // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                 // TCP port to connect to

		$mail->setFrom($from, $fromName);
		$mail->addAddress($to, $name);     // Add a recipient
		$mail->AddReplyTo("no-reply@goeasypos.com","No Reply");
	//	$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('rishabh.saxena@companynonstop.com','rajat@dcubecoders.com');
		$mail->addBCC('goeasy@businessnonstop.co');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	 	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $mailBody;
		$mail->MsgHTML($mailBody);
		$mail->AltBody = 'Thanks For Comming,Have a Nice Day!!';
	
		if(!$mail->send()) {
			return 0;
		   // echo 'Message could not be sent.';exit;

		} else {
			return 1;
		  // echo 'Message has been sent';
		  //  exit;
		}

	}

	function sendMailInvoice($to,$name,$mailBody,$subject,$from,$fromName,$mail)
	{
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; 
		$mail->SMTPDebug  = 0;                               // Enable SMTP authentication
		$mail->Username = 'payment@goeasypos.com';                 // SMTP username
		$mail->Password = 'goeasy@123';                          // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                 // TCP port to connect to

		$mail->setFrom($from, $fromName);
		$mail->addAddress($to, $name);     // Add a recipient
		$mail->AddReplyTo("no-reply@goeasypos.com","No Reply");
	//	$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('rishabh.saxena@companynonstop.com','rajat@dcubecoders.com');
		$mail->addBCC('goeasy@businessnonstop.co');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	 	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $mailBody;
		$mail->MsgHTML($mailBody);
		$mail->AltBody = 'Thanks For Comming,Have a Nice Day!!';
	
		if(!$mail->send()) {
			return 0;
		   // echo 'Message could not be sent.';exit;

		} else {
			return 1;
		  // echo 'Message has been sent';
		  //  exit;
		}

	}

	function sendMailSignUp($to,$name,$mailBody,$subject,$from,$fromName,$mail)
	{
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; 
		$mail->SMTPDebug  = 0;                               // Enable SMTP authentication
		$mail->Username = 'care@goeasypos.com';                 // SMTP username
		$mail->Password = 'care@123';                          // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                 // TCP port to connect to

		$mail->setFrom($from, $fromName);
		$mail->addAddress($to, $name);     // Add a recipient
		$mail->AddReplyTo("no-reply@goeasypos.com","No Reply");
	//	$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('surendra.prasad@dcubecoders.com');
		//$mail->addBCC('rajat@dcubecoders.com','surendra.prasad@dcubecoders.com');
		$mail->addBCC('goeasy@businessnonstop.co');
		//$mail->addBCC('saxena.rishabh6@gmail.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	 	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $mailBody;
		$mail->MsgHTML($mailBody);
		$mail->AltBody = 'Thanks For Comming,Have a Nice Day!!';
	
		if(!$mail->send()) {
			return 0;
		   // echo 'Message could not be sent.';exit;

		} else {
			return 1;
		  // echo 'Message has been sent';
		  //  exit;
		}

	}





	
}


?>