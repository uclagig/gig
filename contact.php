<?php
if(isset($_POST['message'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
    

	$to      = 'uclagiginfo@gmail.com';
	$subject = 'Gig General Contact Form';

	$headers = 'From: '. $email . "\r\n" .
    'Reply-To: '. $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if (!$name || !$email || !$message) {
    $message = 'All fields are required. Please re-send your message.';

    echo "<script type='text/javascript'>
        alert('$message');
        window.location.replace(\"contact.html\");
    </script>";
      $status = FALSE; 
	}
    else {
    	$status = mail($to, $subject, $message, $headers);
    }

	if($status == TRUE){	
		$message = 'Thanks for reaching out! We will be in touch.';

		 echo "<script type='text/javascript'>
        alert('$message');
        window.location.replace(\"contact.html\");
    </script>";
    }
}

?>