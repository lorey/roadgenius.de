<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Bitte alle Felder ausfüllen!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = wordwrap($$_POST['message'], 70);

// Create the email and send the message
$to = 'roadgenius@googlegroups.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Roadgenius - Nachricht von $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@roadgenius.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";

$headers =  'From:' . $email_address . ' . "\r\n" .
            'Reply-To:' . $email_address . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
mail($to,$email_subject,$email_body,$headers);
return true;
?>
