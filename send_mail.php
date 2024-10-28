<?php
// Include PHPMailer autoload (make sure you installed PHPMailer using composer)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure this points to your vendor/autoload.php file from composer

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data safely
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Not provided';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : 'Not provided';
    $brand = isset($_POST['brand']) ? htmlspecialchars($_POST['brand']) : 'Not provided';
    $carModel = isset($_POST['car-model']) ? htmlspecialchars($_POST['car-model']) : 'Not provided';

    // Email content
    $emailSubject = "Service Booking from $name";
    $emailBody = "Name: $name\nPhone: $phone\nBrand: $brand\nCar Model: $carModel";

    // Setup PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tumkuraejaz@gmail.com'; // Your Gmail address
        $mail->Password   = 'imuz uqyt lxuq zhxk';   // Your Gmail app password (not the regular password)
        $mail->SMTPSecure = 'tls';    // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;

        // Sender and recipient settings
        $mail->setFrom('tumkuraejaz@gmail.com', 'Aejaz'); // Your email and name
        $mail->addAddress('tumkuraejaz@gmail.com');    // Add a recipient

        // Email content settings
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = $emailSubject;
        $mail->Body    = $emailBody;

        // Send email
        if ($mail->send()) {
            echo "Message has been sent successfully.";
        } else {
            echo "Message could not be sent.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "No form data received.";
}
?>
