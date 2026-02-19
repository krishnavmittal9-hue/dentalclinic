<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    $form_type = $_POST['form_type'] ?? 'query';

    $to = "mittalkrishnav26@gmail.com"; // your email

    // Differentiate subject and redirect based on form type
    if ($form_type === 'contact') {
        $subject = "New Contact Message - Bright Smile Dental";
        $redirect = "contact.html";
        $body_label = "Message";
    } else {
        $subject = "New Patient Query - Bright Smile Dental";
        $redirect = "query.html";
        $body_label = "Query";
    }

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n\n";
    $body .= "$body_label:\n$message";

    // Use proper headers
    $headers = "From: info@yourdomain.com\r\n"; // replace with your domain email
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if(mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Your $body_label has been sent successfully!'); window.location.href='$redirect';</script>";
    } else {
        echo "<script>alert('Error sending your $body_label. Please try again.'); window.history.back();</script>";
    }
}
?>
