<?php

class Sms

  {

    function send_sms($to, $text)

    {

        // Prepare data for POST request
        $data = array("user" => "8800847728", "pass" => "498b5ac" , "sender" => "GOEASY", "phone" => $to, "text" => $text,"priority" => "ndnd" , "stype" => "normal");
       
        // Send the POST request with cURL
        $ch = curl_init('http://bhashsms.com/api/sendmsg.php?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        //print_r($response);exit;
        // Process your response here
        // echo $response;exit;
        return $response;

      
    }

  }



?>

