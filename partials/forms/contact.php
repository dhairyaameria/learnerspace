<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
#Receive user input
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Validate e-mail
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

#Send email
$headers = "From: $email";
$sent = mail('dhairyaameria567@gmail.com', $subject, $message, $headers);
#Thank user or notify them of a problem
if ($sent) {

?><html>

  <head>
    <title>Thank You</title>
  </head>

  <body>
    <h1>Thank You</h1>
    <p>Thank you for your feedback.</p>
  </body>

  </html>
<?php

} else {

?><html>

  <head>
    <title>Something went wrong</title>
  </head>

  <body>
    <h1>Something went wrong</h1>
    <p>We could not send your feedback. Please try again.</p>
  </body>

  </html>
<?php
}
?>