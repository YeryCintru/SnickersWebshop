<?php

// Maximum inactivity time (5 minutes)
$max_inactivity_time = 5 * 60; // 5 minutes in seconds

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not authenticated, redirect to login
    header('Location: login.php');
    exit();
}

// Check inactivity time
if (isset($_SESSION['last_access']) && (time() - $_SESSION['last_access']) > $max_inactivity_time) {
    // If more than 5 minutes have passed, log out
    session_unset();
    session_destroy();
    header('Location: login.php'); // Redirect to login
    exit();
}

// Update last activity time
$_SESSION['last_access'] = time();
?>
