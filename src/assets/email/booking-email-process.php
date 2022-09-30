<?php
    
	// Edit below lines and give your email and subject
    $email_to = "kiswasolutions06@gmail.com";
    $subject = "Message is sent from ";
	               
	// input fields 
	$email_from = $_POST['txt_email']; 
    $first_name = $_POST['txt_name']; 
	$last_name = $_POST['txt_last_name']; 
	$phone = $_POST['txt_phone']; 
	$dob_date = $_POST['txt_dob']; 
	$country = $_POST['txt_country']; 
	$address = $_POST['txt_address'];
	
	// clean message
	function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }
   
   
   // email message
    $email_message .= "Name: ".clean_string($first_name)." ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
	$email_message .= "Date of Birth Date: ".clean_string($dob_date)."\n";
	$email_message .= "Country: ".clean_string($country)."\n";
	$email_message .= "Address: ".clean_string($address)."\n";
	
	
	// headers
    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
   
  // email send 
   if(@mail($email_to, $subject, $email_message, $headers))
   	echo "sent";
   else 
	echo "fail";
?>