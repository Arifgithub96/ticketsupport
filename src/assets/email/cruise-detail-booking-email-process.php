<?php
    
	// Edit below lines and give your email and subject
    $email_to = "kiswasolutions06@gmail.com";
    $subject = "Cruise Booking Form";
	                   
	// input fields 
	$email_from = $_POST['txt_email']; 
    $first_name = $_POST['txt_first_name']; 
	$last_name = $_POST['txt_last_name']; 
	$phone = $_POST['txt_phone']; 
	$country = $_POST['txt_country']; 
	$pick_date = $_POST['txt_pick_date']; 
	$drop_date = $_POST['txt_drop_date'];
	$drop_hours = $_POST['txt_drop_hours'];
	$drop_mins = $_POST['txt_drop_mins'];
	$pay_method = $_POST['txt_pay_method'];
	
	// clean message
	function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }
   
   
   // email message
    $email_message .= "Name: ".clean_string($first_name)." ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
	$email_message .= "country: ".clean_string($country)."\n";
	$email_message .= "Pick Date: ".clean_string($pick_date)."\n";
	$email_message .= "Drop Date: ".clean_string($drop_date)."\n";
	$email_message .= "Drop Hours: ".clean_string($drop_hours)."\n";
	$email_message .= "Drop Mins: ".clean_string($drop_mins)."\n";
   echo  $email_message .= "Payment Method: ".clean_string($pay_method)."\n";
	
	
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