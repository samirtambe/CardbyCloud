<?php

if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "samir.tambe1@gmail.com";

    $email_subject = "Message from Card By Cloud Website";


    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }

    // validation expected data exists

    if(!isset($_POST['flname'])    ||
        !isset($_POST['phonenum']) ||
        !isset($_POST['email'])    ||
        !isset($_POST['message'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $flname = $_POST['flname']; // required // first and last name

    $email_from = $_POST['email']; // required

    $phonenum = $_POST['phonenum']; // not required

    $message = $_POST['message']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$flname)) {

    $error_message .= 'The Name you entered does not appear to be valid.<br />';

  }

  }

  if(strlen($message) < 2) {

    $error_message .= 'The message you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Name: ".clean_string($flname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($phonenum)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";

// create email headers

$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Exchange Virtual Business cards through the cloud.">
	<meta name="keywords" content="business cards, virtual business cards, digital business cards">
	<title>Card by Cloud - The business card for your smart phone.</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/mymod.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar" id="bottom-border-shadow" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <a href="index.html" class="navbar-brand">Card by Cloud</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="overview.html">About</a></li>
					<li><a href="buy.html">Pricing</a></li>
					<li><a href="contact.html">Contact Us</a></li>
				</ul>
			</div>
		</div>
    </div>
	<div class="container">
		<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Thank you for your interest!</h3>
                <p>We will soon respond to your message.</p>
            </div>
		</div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h4>Our Mobile Apps</h4>
                <p>Remember, the mobile app is <b>TOTALLY FREE</b>. You do not have to be
                    a paid user to receive the contact information from other
                    Card by Cloud&#0153; users.
                </p>
                <br>
                <a href="overview.html" class="btn btn-primary"> Learn More &raquo;</a>
            </div>
        </div>
		<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <br /><br /><br /><br />
                <img src="p-images/fb.png"/>&nbsp;&nbsp;&nbsp;
                <img src="p-images/tw.png"/>&nbsp;&nbsp;&nbsp;
                <img src="p-images/yt.png"/>
            </div>
        </div>
		<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br>
                    <p>&copy; 2015 Gold Boolean LLC, All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
