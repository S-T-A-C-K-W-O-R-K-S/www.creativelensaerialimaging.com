<?PHP
// Check for empty fields.
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message.
$to = "enquiries@creativelensaerialimaging.com"; /* Add your email address inbetween the quote marks. This is where the form will send an email to. */
$subject = "Website Contact Form:  $name";
$body = "You have received a new message from your website's contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@creativelensaerialimaging.com\n"; /* This is the email address the generated message will be from. It is recommended to use "noreply@yourdomain.com" with an autoresponder configured. */
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
