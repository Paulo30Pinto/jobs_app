<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
/*
$mail = new PHPMailer(true);

try {
// Configure SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->Username = 'paulobunga16@gmail.com';
$mail->Password = 'secret';
$mail->Port = 587;

// Set sender and recipient
$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addAddress('paulobunga16@gmail.com', 'Paulo Bunga');

// Set email subject and body
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];

// Send the email
$mail->send();
echo 'Email sent successfully.';
} catch (Exception $e) {
echo 'Error sending email: ' . $mail->ErrorInfo;
}
*/

$receiving_email_address = 'paulobunga16@gmail.com';

if( file_exists($php_email_form = 'PHPMailer/src/PHPMailer.php' )) {
  include( $php_email_form );
} else {
  die( 'Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];
$contact->message = $_POST['message'];

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

$contact->smtp = array(
  'host' => 'paulobunga16@gmail.com',
  'username' => 'Paulo Bunga',
  'password' => 'secret',
  'port' => '587'
);


$contact->add_message( $_POST['name'], 'From');
$contact->add_message( $_POST['email'], 'Email');
$contact->add_message( $_POST['message'], 'Message', 10);

echo $contact->send();
?>
