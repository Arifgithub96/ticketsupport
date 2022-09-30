<?php
    
	// Edit below lines and give your email and subject
    $email_to = "kiswasolutions06@gmail.com";
    $subject = "Message is sent from ";
	
	// input fields 
	$email_from = $_POST['txt_email']; 
    $name = $_POST['txt_name']; 
	$phone = $_POST['txt_phone'];
	$message = $_POST['txt_message'];
	
	// clean message
	function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }
   
   
   // email message
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
	
	
	// headers
    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
   
  // email send 
   //if(@mail($email_to, $subject, $email_message, $headers))
   	echo "sent";
  // else 
//	echo "fail";
?>