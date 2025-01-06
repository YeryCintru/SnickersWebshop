<?php
session_start();
require 'database.php';

// Get the user from the database
$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare('SELECT * FROM users WHERE IDuser = :id');
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if it is the first login
if ($user['first_login'] != 1) {
    $_SESSION['Authorized']=true;
    header('Location: homePage.php'); // If not the first login, redirect to home
    exit;
}

// Handle password update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Validate that the passwords match
    if ($newPassword !== $confirmPassword) {
        $_SESSION['error_message'] = "Passwords do not match. Please try again.";
    } else {
        // Validate that the new password meets the requirements
        if (
            strlen($newPassword) < 9 || // Minimum length
            !preg_match('/[A-Z]/', $newPassword) || // At least one uppercase letter
            !preg_match('/[a-z]/', $newPassword) || // At least one lowercase letter
            !preg_match('/\d/', $newPassword) // At least one number
        ) {
            $_SESSION['error_message'] = "The new password does not meet the minimum requirements.";
        } else {
            // Hash the new password
            $hashedPassword = hash('sha512', $newPassword);

            // Update the password in the database
            $stmt = $pdo->prepare("UPDATE users SET password = ?, first_login = 0 WHERE IDuser = ?");
            $stmt->execute([$hashedPassword, $userId]);

            // Update the session to reflect that the password has been changed
            $_SESSION['success_message'] = "Password successfully changed. Welcome!";

            // Redirect the user to the homepage
            header('Location: homePage.php');
            exit;
        }
    }
}
?>
