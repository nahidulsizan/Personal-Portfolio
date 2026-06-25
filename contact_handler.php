<?php
// contact_handler.php

// 1. Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed.';
    exit;
}

// 2. Get and sanitize form inputs
$name    = trim($_POST['name']  ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Basic validation
if ($name === '' || $email === '' || $message === '') {
    http_response_code(400);
    echo 'Please fill in all fields.';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo 'Please enter a valid email address.';
    exit;
}

// 3. Prepare email
$to      = 'nsx513@uregina.ca';   // <- put your real email here
$subject = 'New message from portfolio contact form';
$body    = "You have received a new message from your portfolio site:\n\n"
         . "Name:  {$name}\n"
         . "Email: {$email}\n\n"
         . "Message:\n{$message}\n";

$headers   = "From: {$email}\r\n";
$headers  .= "Reply-To: {$email}\r\n";

// 4. Send email (simple mail() version)
$sent = mail($to, $subject, $body, $headers); // [web:165][web:171]

if ($sent) {
    // Simple thank-you text response
    echo 'Thank you for your message! I will get back to you soon.';
} else {
    http_response_code(500);
    echo 'Sorry, something went wrong while sending your message.';
}