
<?php

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = "Name: $name\r\n";
    $message .= "Email: $email\r\n";

	$to      = 'uclagiginfo@gmail.com';
	$subject = 'Gig Waiting List Request Form';

	$headers = 'From: '. $email . "\r\n" .
    'Reply-To: '. $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

	if (!$name || !$email) {
    	$message = 'All fields are required. Please re-send your message.';

    echo "<script type='text/javascript'>
        alert('$message');
                window.location.replace(\"students.html\");
    </script>";
      $status = FALSE; 
    }
    elseif (substr($email, -8) != 'ucla.edu') {
    	$message = 'Sorry! We are currently only accepting UCLA students. 
        Try again with your ucla.edu email address.';

    echo "<script type='text/javascript'>
        alert('$message');
                window.location.replace(\"students.html\");
    </script>";
      $status = FALSE; 
    }
    else {
    	$status = mail($to, $subject, $message, $headers);
    }


	if($status == TRUE){	
		$message = 'Thanks for signing up! We will be in touch.';

         echo "<script type='text/javascript'>
        alert('$message');
        window.location.replace(\"students.html\");

        </script>";
    }

	echo json_encode($res);
}

?>