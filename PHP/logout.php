<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; 

    $stmt = $pdo->prepare(
        "UPDATE users 
        SET active = ?, last_login = ? 
        WHERE IDuser = ?"
    );
    
    $currentDateTime = date('Y-m-d H:i:s');
    
    $stmt->execute([0, $currentDateTime, $userId]);

    // Optionally check if the query was successful
    if ($stmt->rowCount() > 0) {
        echo "User status updated to inactive successfully.";
    } else {
        echo "Failed to update user status.";
    }
} else {
    echo "User not logged in.";
}

session_unset();
session_destroy();
header('Location: index.php');
exit();
?>