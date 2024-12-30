<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "dependences_php/security.php";
include 'dependences_php/headImport.php';



?>





<main>




<h2>Thank you for your order!</h2>

<script>
        window.onload = function() {
            alert('Order created succesfully!');
        };
    </script>

</main>


</body>

</html>
<?php include 'dependences_php/footImport.php';?>

