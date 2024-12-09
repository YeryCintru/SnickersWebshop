<?php 
require 'database.php';
// var_dump($_POST)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if the password meets the requirements
    if (strlen($password) < 9) {
        echo "The password must be at least 9 characters long.<br>";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        echo "The password must contain at least one uppercase letter.<br>";
    } elseif (!preg_match('/[a-z]/', $password)) {
        echo "The password must contain at least one lowercase letter.<br>";
    } elseif (!preg_match('/\d/', $password)) {
        echo "The password must contain at least one number.<br>";
    } else {
        // Search for the user in the database
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // If credentials are valid, start a session
            $_SESSION['user_id'] = $user['IDuser'];  // Use the correct column for the ID
            $_SESSION['username'] = $user['username'];
            header('Location: homePage.php'); // Redirect to the main page
            exit;
        } else {
            echo "Incorrect username or password.<br>";
        }
    }
}

?>
