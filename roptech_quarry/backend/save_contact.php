<?php
// Include required files
include_once 'config/database.php';
include_once 'models/Contact.php';

// Start session for flash messages
session_start();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // Initialize Contact object
    $contact = new Contact($db);
    
    // Set contact data
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->message = $_POST['message'];
    
    // Validate required fields
    if (empty($contact->name) || empty($contact->email) || empty($contact->phone) || empty($contact->message)) {
        $_SESSION['message'] = 'All fields are required.';
        $_SESSION['message_type'] = 'error';
        header('Location: ../index.html#contact');
        exit;
    }
    
    // Validate email
    if (!filter_var($contact->email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = 'Invalid email format.';
        $_SESSION['message_type'] = 'error';
        header('Location: ../index.php#contact');
        exit;
    }
    
    // Create the contact entry
    if ($contact->create()) {
        // Send email notification (optional)
        sendEmailNotification($_POST);
        
        $_SESSION['message'] = 'Thank you for your message! We will get back to you soon.';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Unable to send message. Please try again.';
        $_SESSION['message_type'] = 'error';
    }
    
    // Redirect back to contact form
    header('Location: ../index.php#contact');
    exit;
    
} else {
    // If someone tries to access this page directly
    header('Location: ../index.php');
    exit;
}

function sendEmailNotification($data) {
    $to = "info@roptechquarry.co.ke";
    $subject = "New Contact Form Submission - Roptech Quarry";
    $message = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; }
            .header { background: #2c3e50; color: white; padding: 10px; text-align: center; }
            .content { padding: 20px; }
            .field { margin-bottom: 10px; }
            .field strong { display: inline-block; width: 100px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='field'><strong>Name:</strong> {$data['name']}</div>
                <div class='field'><strong>Email:</strong> {$data['email']}</div>
                <div class='field'><strong>Phone:</strong> {$data['phone']}</div>
                <div class='field'><strong>Message:</strong> {$data['message']}</div>
                <div class='field'><strong>Submitted:</strong> " . date('Y-m-d H:i:s') . "</div>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: website@roptechquarry.co.ke" . "\r\n";
    $headers .= "Reply-To: {$data['email']}" . "\r\n";

    // Uncomment the line below enable sending emails
    // @mail($to, $subject, $message, $headers);
}
?>