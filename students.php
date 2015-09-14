<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gig</title>

    <!-- CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
    <link href="assets/css/animate.css" rel="stylesheet">

    <!-- Custom styles CSS -->
    <link href="assets/css/style.css" rel="stylesheet" media="screen">

    <script src="assets/js/modernizr.custom.js"></script>

</head>
<body>

<!-- Preloader -->

<div id="preloader">
    <div id="status"></div>
</div>

<!-- Navigation start -->

<header class="header">

    <nav class="navbar navbar-custom" role="navigation">

        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Gig</a>
            </div>

            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li class="active"><a href="students.php">Students</a></li>
                    <li><a href="recruiters.html">Recruiters</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

        </div><!-- .container -->

    </nav>

</header>

<!-- Navigation end -->



<!-- Skills start -->

<section class="pfblock pfblock-gray" id="skills">

    <div class="container">

        <div class="row skills">

            <div class="row">

                <div class="col-sm-8 col-sm-offset-2">

                    <div class="pfblock-header wow fadeInUp">
                        <h2 class="pfblock-title">Students</h2>
                        <div class="pfblock-subtitle">
                            Connection building can be tough and seem extraneous when beginning a career in a field you love.
                            That’s why we want to help out. So sign up! Its free and always will be.
                            <br><br><br><div style="font-size: 20px; color: black;">How it works:</div> <br>
                            Simply sign up with your name and email address. You will receive an email with a
                            link to send in your resume. From there we will send it to recruiters and companies
                            looking for top talent like you. You’ll get emails about new opportunities, get
                            introduced to numerous Bruins, and gain referrals and connections within organizations we think you’ll love.

                            <br><br>
                            <a href="#info" class="btn btn-lg">Let's get started</a>

                        </div>
                    </div>

                </div>

            </div><!-- .row -->


        </div><!--End row -->

    </div>

</section>

<!-- Skills end -->

<!-- CallToAction start -->

<section class="pfblock calltoaction" id="info">
    <div class="container">

        <div class="row text-center">
            <h1 style="padding-bottom: 10px; padding-top:100px; ">Send In Your Info</h1>
        </div>
        <div class="row" style="padding-bottom: 0px;">
            <div class="col-lg-1"></div>
            <div class="pfblock-subtitle" style="color: white;">
                <div class="pfblock-subtitle">

                    <?php

                        //check for header injections
                        function has_header_injection($str) {
                            return preg_match("/[\r\n]/", $str);
                        }

                        if (isset($_POST['contact_submit'])) {
                            $name = trim($_POST['name']);
                            $email = trim($_POST['email']); 

                            //check to see if name or email have header injections
                            if (has_header_injection($name) || has_header_injection($email)) {
                                die(); 
                            } 

                            //basic validation checks
                            if (!$name || !$email) {
                                echo '<script>alert("All fields are required.")</script>'; 
                            }

                            $email_domain = substr($email, -8);
                            if ($email_domain != "ucla.edu") {
                                echo '<script>alert("Sorry! We are currently only accepting UCLA students.")</script>'; 
                            }
                            //add recipient
                            $to = "raks.garg@gmail.com";
                            $subject = "$name wants to be on the email list for Gig!";
                            $message = "Name: $name\r\n";
                            $message .= "Email: $email\r\n"; 

                            $message = wordwrap($message, 72); 

                            //set mail headers 
                            $headers = "MIME-Version: 1.0\r\n";
                            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n"; 
                            $headers .= "From: $name <$email> \r\n";
                            $headers .= "X-Priority: 1\r\n";
                            $headers .= "X-MSMail-Priority: High\r\n\r\n"; 

                            //send mail
                            mail($to, $subject, $message, $headers); 
                    ?>

                    <!-- show success message -->
                    <h5>You're all set. We'll contact you shortly.</h5>

                    <?php } else { ?>


                    <h4 style=" padding-bottom: 10px; color: white; font-size: 14px; font-weight: 400;">All fields are required. Please use your ucla.edu email address. </h4>
                    <form method="post" action="" id="contact-form">
                        <input type="text" id="name" name="name" placeholder="name" style="color: #000; width: 25%" >
                        <br>
                        <input type="text" id="email" name="email" placeholder="email" style="color: #000; width: 25%">
                        <br><br>
                        <input type="submit" name="contact_submit" class="btn btn-lg" value="Sign me up">
                    <!--  <a href="" class="btn btn-lg">Send Resume</a> -->
                    </form>
                    <?php } ?>

                </div>
            </div>
    </div>
</section>

<!-- CallToAction end -->

<!-- <section class="pfblock pfblock-gray">
    <div class="container"></div>
</section>
 -->

<!-- Footer start -->

	<footer id="footer">
    <div class="container">
		<div class="row" style="padding-top: 20px;">

			<div class="col-sm-12" style="padding-bottom: 40px;">
					<a href="index.html" style="border-right: 1px solid white; padding-right: 20px;">Home</a>
					<a href="about.html" style="border-right: 1px solid white; padding-right: 20px; padding-left: 20px;">About</a>
					<a href="students.php" style="border-right: 1px solid white; padding-right: 20px; padding-left: 20px;">Students</a>
					<a href="recruiters.html" style="border-right: 1px solid white; padding-right: 20px; padding-left: 20px;">Recruiters</a>
					<a href="contact.html" style="border-right: 1px solid white; padding-right: 20px; padding-left: 20px;">Contact</a>
					<a href="faq.html" style="padding-left: 20px;">FAQs</a>
			</div>

		</div><!-- .row -->
        <div class="row">

            <div class="col-sm-12">

                <ul class="social-links">
                    <li><a href="index.html#" class="wow fadeInUp"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".1s"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".2s"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".4s"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".5s"><i class="fa fa-envelope"></i></a></li>
                </ul>

                <p style="margin-bottom: 5px !important;">
                    an alternative to a traditional hiring experience.
                </p> 
                <p class="copyright">
                    © 2015 Gig | Images: <a href="https://unsplash.com/">Unsplash</a></a>
                </p>

            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</footer>

<!-- Footer end -->

<!-- Scroll to top -->



<!-- Scroll to top end-->

<!-- Javascript files -->

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.parallax-1.1.3.js"></script>
<script src="assets/js/imagesloaded.pkgd.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/smoothscroll.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.easypiechart.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.cbpQTRotator.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>