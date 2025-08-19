<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "rubangeoinfo@gmail.com";
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? 'Contact Form Submission');
    $message = trim($_POST['message'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit;
    }

    $body = "Name: $name\nEmail: $email\n\n$message";
    $headers = "From: $name <$email>\r\n" .
               "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "OK";
    } else {
        echo "Failed to send message";
    }
} else {
    echo "Method not allowed";
}
?>
