<?php 
require 'database.php';

try {
    $userId = $_SESSION['user_id']; 
    $stmt = $pdo->prepare("SELECT firstName, lastName, last_login, active FROM users WHERE IDuser = ?");
    $stmt->execute([$userId]);

    // Fetch results
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Extract user data
        $firstName = $user['firstName'];
        $lastName = $user['lastName'];
        $lastLogin = $user['last_login'];
   
        // Format last login date
        $dateTime = new DateTime($lastLogin);
        $dayOfWeek = $dateTime->format('l'); // Day of the week
        $formattedDate = $dateTime->format('d.m.Y'); // Date in DD.MM.YYYY format

        $message = "Welcome Mr/Mrs $lastName. You were last online on $dayOfWeek - $formattedDate.";
    } else {
        $errorMessage = "User not found.";
    }
} catch (PDOException $e) {
    // Error handling
    $errorMessage = "Database error: " . $e->getMessage();
}
?>
