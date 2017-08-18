<?php 
class Mailer
{
	function send_mail($ids,$subject,$mailBody)
	{
		$flag = 0;
		for($count=0;$count<count($ids);$count++)
		{
		   error_log($ids[$count]);
		   $to = $ids[$count];
		   $subject = $subject;
		   $header = "From: Bits Support Team<priyanka@limitlessmobil.com> \r\n";
		//   $header = "Cc:admin@cleancute.com \r\n";
		   $header .= "MIME-Version: 1.0\r\n";
		   $header .= "Content-type: text/html\r\n";
		   $message = $mailBody;
		   
		   $retval = mail ($to,$subject,$message,$header);
			
		   if( $retval == true )
			$flag = 1;
		   error_log(' sent : '.$flag);
		}
		return $flag;
	}
	
}


?>