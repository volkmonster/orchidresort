<?php


require_once ('../PHPMailerAutoload.php');


//Create a new PHPMailer instance
$mail = new PHPMailer();

$mail->Encoding = "quoted-printable";
$mail->CharSet = "utf-8";

// Set PHPMailer to use the sendmail transport
$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom('theorchidresort@gmail.com', 'Orchid Resort');
//Set an alternative reply-to address
$mail->addReplyTo('no-reply@gmail.com', 'no-reply');
//Set who the message is to be sent to
$mail->addAddress($_GET['customer_email'], $_GET['fullname']);
//Set the subject line
$mail->Subject = 'Orchidresort booking information';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body


$arrayparam = array(
	'booking_number'=>$_GET['booking_number'],
	'fullname'=>$_GET['fullname'],
	'checkin'=>$_GET['checkin'],
	'checkout'=>$_GET['checkout'],
	'amount_rooms'=>$_GET['amount_rooms'],
	'breakfast'=>$_GET['breakfast'],
	'roomtype'=>$_GET['roomtype']
	);

$query = http_build_query($arrayparam);

$mail->msgHTML(file_get_contents('http://orchidresort.net/phpmailer/examples/booking.php?'.$query.''), dirname(__FILE__));
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
