<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "dependences_php/security.php";
include 'dependences_php/headImport.php';



?>






<main>
    <div class="d-flex justify-content-center align-items-center vh-50 bg-light">
        <div class="container text-center bg-white p-5 rounded shadow">

            <h1 class="text-primary">Thank you for your order!</h1>
            <p class="text-muted">The order details have been sent to your email</p>
            <!-- Back to homepage button -->
            <a href="homePage.php" class="btn btn-primary mt-3">Back to Homepage</a>
        </div>
    </div>

<script>
        window.onload = function() {
            alert('Order created succesfully!');
        };
    </script>

</main>


</body>

</html>
<?php include 'dependences_php/footImport.php';?>

