<?php
require 'database.php'; // Make sure to include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    // Validate the fields
    if (empty($email) || empty($name) || empty($message)) {
        echo "All fields are required.<br>";
    } else {
        // Make sure that the 'supportTickets' table exists in your database
        $stmt = $pdo->prepare('INSERT INTO supportTickets (Name, Description, IDuser) 
                               VALUES (:name, :message, :user_id)');

        // Assuming the user session is already started and the user ID is available
        $user_id = $_SESSION['user_id']; // You must have a user authentication system

        $stmt->execute([
            ':name' => $name,
            ':message' => $message,
            ':user_id' => $user_id
        ]);

        echo "Your message has been submitted successfully.<br>";
        header('Location: thankYouPage.php'); // Redirect to a thank you page
        exit;
    }
}
?>
