<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Set the recipient email address
    $to = "ms.excel.amadi@gmail.com"; // Your email address<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fafafa;
            color: #333;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            color: #00796B;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
        }

        a {
            color: #00796B;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Thank You!</h1>
    <p>Your message has been sent successfully. We'll get back to you as soon as possible.</p>
    <p><a href="index.html">Return to Homepage</a></p>
</body>
</html>

    // Set the email subject
    $subject = "New Message from Glamorous You Contact Form";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank you page (optional)
        header("Location: thank_you.html");
        exit;
    } else {
        // Display an error message if the email fails to send
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // If the form is not submitted, redirect to the contact form page
    header("Location: contact.html");
    exit;
}
?>