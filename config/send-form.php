<?php
$email = $_POST["email"];
$name = $_POST["name"];
$message = $_POST["message"];

// Setup our message
$email_message .= 'Name: ' . $name . '\n';
$email_message .= 'Email: ' . $email . '\n';
$email_message .= 'Message: ' . $message;

// Setup headers
mail('b.manzella@vatna.org', 'New Message from VATNA', $email_message);

header('Location: ../../views/contact.php');
