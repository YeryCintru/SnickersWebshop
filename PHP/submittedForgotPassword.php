<?php 
session_start();
$title = "UrbanKicks";
include 'dependences_php/headImport.php';
?>
<main class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-50">
        <div class="text-center p-4 border rounded shadow-sm bg-white">
            <h2 class="text-success">Password Sent!</h2>
            <p class="lead">We have sent a new password to your email. Please check your inbox and spam folder.</p>
            <p class="text-muted">If you did not receive the email, please try again or contact support.</p>
            <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
        </div>
    </div>
</main>
<?php include 'dependences_php/footImport.php'; ?>
</body>

</html>