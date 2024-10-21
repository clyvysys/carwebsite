<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $brand = $_POST['brand'];
    $car_model = $_POST['car-model'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tumkuraejaz@gmail.com'; // Your Gmail address
        $mail->Password = 'imuz uqyt lxuq zhxk'; // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('tumkuraejaz@gmail.com', 'Aejaz'); // Your Gmail address and name
        $mail->addAddress('tumkuraejaz@gmail.com'); // Add a recipient's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Service Booking';
        $mail->Body    = "<h1>New Service Booking</h1>
                          <p><strong>Name:</strong> $name</p>
                          <p><strong>Phone:</strong> $phone</p>
                          <p><strong>Brand:</strong> $brand</p>
                          <p><strong>Car Model:</strong> $car_model</p>";

        // Send the email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
