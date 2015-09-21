<?php

if(!isset($_POST['flname'])) {
    echo 'ERROR: First/last name not submitted';
    die();
}

if(!isset($_POST['email'])) {
    echo 'ERROR: Email was not submitted';
    die();
}

if(!isset($_POST['message'])) {
    echo 'ERROR: Message was not submitted';
    die();
}

$email_to = "samir.tambe1@gmail.com";

$email_subject = "Message from Card By Cloud Website";

$flname = $_POST['flname']; // required // first and last name

$email_from = $_POST['email']; // required

$phonenum = $_POST['phonenum']; // not required

$message = $_POST['message']; // required

//echo 'USER ENTERED: '.$flname.' | '.$email_from.' | '.$phonenum.' | '.$message;

$error_message = "";

$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';



if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

}

$string_exp = "/^[A-Za-z .'-]+$/";

if(!preg_match($string_exp,$flname)) {

    $error_message .= 'The Name you entered does not appear to be valid.<br />';

}

  if(strlen($message) < 2) {

    $error_message .= 'The message you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {
      echo 'Error = '.$error_message;
      die();
  }
/* ---------------------------------------------------------------- */
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
echo 'Email successfully sent!';
?>
