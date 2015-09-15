
<?php

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$company = $_POST['company'];

	$to      = 'info@uclagig.com';
	$subject = 'Gig Recruiters Contact Form';

    $email_body = "Name: $name\r\n" ;
    $email_body .=  "Email: $email\r\n";
    $email_body .= "Company: $company\r\n";
    $email_body .= "Message: $message\r\n";

	$headers = 'From: '. $email . "\r\n" . 'Reply-To: '. $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();

	if (!$name || !$email || !$message || !$company ) {
    	$message = 'All fields are required. Please re-send your message.';

    echo "<script type='text/javascript'>
        alert('$message');
                window.location.replace(\"recruiters.html\");
    </script>";
      $status = FALSE; 
    }
    else {
    	$status = mail($to, $subject, $email_body, $headers);
    }

	if($status == TRUE){	
		$message = 'Thanks for reaching out! We will be in touch.';

		 echo "<script type='text/javascript'>
    	alert('$message');
    	        window.location.replace(\"recruiters.html\");

    	</script>";
    }

}

?>