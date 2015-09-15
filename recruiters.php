<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean - One Page Personal Portfolio</title>

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
                <a class="navbar-brand" href="index.html">GIG</a>
            </div>

            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="students.html">Students</a></li>
                    <li class="active"><a href="recruiters.html">Recruiters</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

        </div><!-- .container -->

    </nav>

</header>

<section class="recruits-background">
    <div class="container">
        <h1 class="text-center" style="padding: 150px; color: white;"></h1>
    </div>
</section>

<!-- Testimonials start -->

<section id="testimonials" class="pfblock">

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <div class="pfblock-header wow fadeInUp flex-center-vertically" style="text-align: left !important;">
                    <h2 class="pfblock-title pull-left">Recruitment</h2>
                    <div class="pfblock-subtitle3 pull-left">
                        Our goal is to provide valuable opportunities for both companies and
                        students. At UCLA Engineering, we see loads of talented individuals looking
                        for a chance to contribute to the world of technology. We want to connect
                        companies and fellow alumni with these students to produce amazing results.
                        To receive access to UCLA Computer Science and Computer Science and Engineering
                        student resumes please fill out the form below and tell us what you’re looking for.
                    </div>
                </div>

            </div>

        </div><!-- .row -->
        <div class="pfblock-line"></div>
<!--         <form id="contact-form" role="form">
            <div class="row" style="padding-top: 0px;">
                <div class="col-sm-6 flex-center-vertically">

                        <div class="ajax-hidden">
                            <div class="form-group wow fadeInUp">
                                <label class="sr-only" for="c_name">Name</label>
                                <input type="text" id="c_name" class="form-control" style="font-size: 14px;" name="c_name" placeholder="Name*">
                            </div>

                            <div class="form-group wow fadeInUp" data-wow-delay=".1s">
                                <label class="sr-only" for="c_company">Company</label>
                                <input type="text" id="c_company" class="form-control" style=" font-size: 14px;" name="c_compnay" placeholder="Company*">
                            </div>

                            <div class="row">
                                <div class="col-sm-8 form-group wow fadeInUp" data-wow-delay=".1s">
                                    <label class="sr-only" for="c_email">Email</label>
                                    <input type="email" id="c_email" class="form-control" style=" font-size: 14px;" name="c_email" placeholder="E-mail*">
                                </div>
                                <div class="col-sm-4 form-group wow fadeInUp" data-wow-delay=".1s">
                                    <label class="sr-only" for="c_phone">Phone</label>
                                    <input type="tel" id="c_phone" class="form-control" style=" font-size: 14px;" name="c_phone" placeholder="Phone">
                            </div>
                        </div>

                    </div>

                    <div class="ajax-response"></div>
                </div>

                <div class="col-sm-6 flex-center-vertically">
                    <div class="ajax-hidden">

                        <div class="form-group wow fadeInUp" data-wow-delay=".2s">
                            <textarea class="form-control" id="c_message" name="c_message" rows="7" style=" font-size: 14px;" placeholder="What type of students are you looking for?*"></textarea>
                        </div>

                    </div>

                    <div class="ajax-response"></div>
                </div>
            </div>

            <div class="row" style="text-align: center;">
                <div class="col-sm-5"></div>
                <a href="#info" class="btn btn-lg col-sm-2">Send</a>
                <div class="col-sm-5"></div>
            </div>
        </form> -->


        
                <?php
                    //check for header injections
                    function has_header_injection($str) {
                        return preg_match("/[\r\n]/", $str);
                    }

                    if (isset($_POST['contact_submit'])) {
                        $name = trim($_POST['name']);
                        $name = trim($_POST['company']); 
                        $email = trim($_POST['email']); 
                        $message = trim($_POST['message']);
                        //check to see if name or email have header injections
                        if (has_header_injection($name) || has_header_injection($company) || has_header_injection($email) || has_header_injection($message)) {
                            die(); 
                        } 

                        //basic validation checks
                        if (!$name || !company || !$email || !$message) {
                            echo '<script>alert("All fields are required.")</script>'; 
                        }

                        //add recipient
                        $to = "raks.garg@gmail.com";
                        $subject = "$name wants to be on the email list for Gig!";
                        $email_body  = "Name: $name\r\n";
                        $email_body .= "Company: $company\r\n";
                        $email_body .= "Email: $email\r\n"; 
                        $email_body .= "Message: $message\r\n"; 

                        $email_body = wordwrap($email_body, 72); 

                        //set mail headers 
                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n"; 
                        $headers .= "From: $name <$email> \r\n";
                        $headers .= "X-Priority: 1\r\n";
                        $headers .= "X-MSMail-Priority: High\r\n\r\n"; 

                        //send mail
                        mail($to, $subject, $email_body, $headers); 
                ?>
                <!-- show success message -->
                <h5>You're all set. We'll contact you shortly.</h5>
                <?php } else { ?>

                <form method="post" action="" id="contact-form">
                    <div class="row" style="padding-bottom: 0px;">
            <div class="col-sm-6 flex-center-vertically">
                    <div class="form-group wow fadeInUp">
                    <input class="form-control" type="text" id="name" name="name" placeholder="Name" style="color: #000; width: 25%" >
                    </div>
                    <br>
                    <div class="form-group wow fadeInUp">
                    <input class="form-control" type="text" id="company" name="company" placeholder="Company" style="color: #000; width: 25%">
                    </div>                        
                    <br>
                    <div class="form-group wow fadeInUp">
                    <input class="form-control" type="text" id="email" name="email" placeholder="Email" style="color: #000; width: 25%">
                    </div>                        
                    <br>
                    <div class="form-group wow fadeInUp">
                    <textarea rows="7" class="form-control" type="text" id="message" name="message" placeholder="What kind of students are you looking for?" style="color: #000; width: 25%"></textarea>
                    </div>                        
                    <br><br>
                    <input type="submit" name="contact_submit" class="btn btn-lg" value="Sign me up">
                            </div>
        </div>
                </form>
                <?php } ?>
    </div>
</section>

<!-- Testimonial end -->

<!-- Footer start -->

<footer id="footer">
    <div class="container">
        <div class="row" style="padding-top: 20px;">

            <div class="col-sm-12" style="padding-bottom: 40px;">
                <a href="index.html" style="border-right: 1px solid white; padding-right: 20px;">Home</a>
                <a href="about.html" style="border-right: 1px solid white; padding-right: 20px; padding-left: 20px;">About</a>
                <a href="students.html" style="border-right: 1px solid white; padding-right: 20px; padding-left: 20px;">Students</a>
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

<div class="scroll-up">
    <a href="#home"><i class="fa fa-angle-up"></i></a>
</div>

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