<?php 
if (isset($_POST['sending_email_btn'])) {
  $name = "user";
  $email = $_POST['email'];
  $subject = "Password Ressetting";
  $emailSendMessage = "your new password is ********";
  // Content-Type helps email client to parse file as HTML 
  // therefore retaining styles
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Test <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
  $message = "<html>
  <head>
  	<title>Welcome</title>
  </head>
  <body>
  	<h1>" . $subject . "</h1>
  	<p>".$emailSendMessage."</p>
  </body>
  </html>";
  if (mail($email, $subject, $message, $headers)) {
   echo "Send Sucessfully, Good Luck Email sent";
  }else{
   echo "sorry, Failed to send email. Please try again later";
  }
}
?>