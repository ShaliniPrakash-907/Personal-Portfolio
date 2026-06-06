<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Name validation
    if (empty($name)) {
        die("Name is required");
    }

    if (strlen($name) < 3) {
        die("Name must contain at least 3 characters");
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address");
    }

    // Message validation
    if (empty($message)) {
        die("Message cannot be empty");
    }

    if (strlen($message) < 10) {
        die("Message should contain at least 10 characters");
    }

    // Prevent SQL Injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO contact_messages
            (name, email, subject, message)
            VALUES
            ('$name','$email','$subject','$message')";

    if (mysqli_query($conn, $sql)) {

        echo "<script>
                alert('Message sent successfully!');
                window.location.href='index.php#contact';
              </script>";

    } else {

        echo "<script>
                alert('Something went wrong!');
                window.location.href='index.php#contact';
              </script>";
    }
}
?>