<?php
session_start();
$title = "Thank You for Registering";
setcookie('email', '', time() - 3600, '/'); // Delete email cookie
include 'dependences_php/headImport.php';
?>
<main>
    <div class="d-flex justify-content-center align-items-center vh-50 bg-light">
        <div class="container text-center bg-white p-5 rounded shadow">
            <?php
            // Check if cookies are set
            if (isset($_COOKIE['email'])) {
                $email = $_COOKIE['email']; // Retrieve the email from the cookie
            }
                // Ensure that the password is set correctly
                $email = isset($email) ? htmlspecialchars($email) : 'Email not available';
            
            ?>

            <h1 class="text-primary">Thank You for Registering</h1>
            <p class="text-muted">The password has been sent to your email: <strong><?php echo $email; ?></strong>.</p>
            <!-- Back to homepage button -->
            <a href="index.php" class="btn btn-primary mt-3">Back to Homepage</a>
        </div>
    </div>
</main>

<?php 
    include 'dependences_php/footImport.php'; 
?>

</body>
</html>
