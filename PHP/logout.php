<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; // Retrieve user ID from the session

    // Prepare the SQL query to update the user's 'active' status
    $stmt = $pdo->prepare(
        "UPDATE users 
         SET active = ? 
         WHERE IDuser = ?"
    );

    // Execute the query with '0' (inactive) status for the user
    $stmt->execute([0, $userId]);

    // Optionally check if the query was successful
    if ($stmt->rowCount() > 0) {
        echo "User status updated to inactive successfully.";
    } else {
        echo "Failed to update user status.";
    }
} else {
    echo "User not logged in.";
}

session_unset(); // Eliminar variables de sesión
session_destroy(); // Destruir la sesión
header('Location: index.php'); // Redirigir al login
exit();
?>