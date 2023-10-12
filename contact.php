<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $message = $_POST["message"];

    // Compose the email message
    $to = "janithjayashan018@gmail.com"; // Replace with your recipient's email address
    $subject = "New Contact Form Submission from $first_name $last_name";
    $message_body = "Name: $first_name $last_name\n";
    $message_body .= "Email: $email\n";
    $message_body .= "Mobile: $mobile\n";
    $message_body .= "Message:\n$message";

    // Set additional headers (you can customize these)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $message_body, $headers)) {
        // Email sent successfully
        header("Location: contact.html"); // Redirect to a thank you page
    } else {
        // Email sending failed
        echo "Failed to send the email. Please try again.";
    }
} else {
    // Handle non-POST requests or direct access to the script
    echo "Invalid request.";
}
?>
