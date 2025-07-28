<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'olutefc@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->message = $_POST['message'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();
//   $contact->from_name = $_POST['name'];
// $contact->from_email = $_POST['email'];
// $contact->add_message($_POST['name'], 'From');
// $contact->add_message($_POST['email'], 'Email');
// $contact->add_message($_POST['message'], 'Message', 10);
// $contact->from_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
// $contact->from_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
// <?php
// Set your email address
$to = "olutefc@gmail.com";

// Get and sanitize input
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Optional: subject
$subject = "New Contact Message from Website";

// Basic validation
if (!$name || !$email || !$message) {
  http_response_code(400);
  echo "Please complete the form correctly.";
  exit;
}

// Build the email content
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n\n";
$email_content .= "Message:\n$message\n";

// Additional headers
$headers = "From: $name <$email>";

// Send the email
if (mail($to, $subject, $email_content, $headers)) {
  http_response_code(200);
  echo "OK";
} else {
  http_response_code(500);
  echo "Failed to send message.";
}
?>

// ?>
