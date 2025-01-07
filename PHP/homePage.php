<?php
session_start();
include "dependences_php/security.php";
$title = "UrbanKicks";
include 'dependences_php/headImport.php';
include 'dependences_php/welcomeUser.php';
?>
<main>

<div class="container d-flex justify-content-center align-items-center vh-50">
        <div class="card shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="card-body text-center">
                <?php if (isset($message)) { ?>
                    <h1 class="card-title text-primary">Welcome!</h1>
                    <p class="card-text text-secondary"><?php echo $message; ?></p>
                <?php } elseif (isset($errorMessage)) { ?>
                    <p class="card-text text-danger fw-bold"><?php echo $errorMessage; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="text-center my-4">
    <h2 class="fw-bold text-info">
        <i class="bi bi-person-circle"></i> Usuarios Conectados: 
        <span id="connected-count" class="badge bg-success rounded-pill">0</span>
    </h2>
</div>   
    <div class="image-container">
        <img src="..\Images\homePage\imageHomePage.jpg" alt="Descripción de la imagen">
        <div class="overlay-text">
            New season! New products!
            <br>
            <button type="button" class="btn btn-info">Discover now</button>
        </div>
    </div>

    <div class="image-container">
        <img src="..\Images\homePage\basketball.jpg" alt="Descripción de la imagen">
        <div class="overlay-text" style="--overlay-left: 70%;">
            Basketball season
            <br>
            <button type="button" class="btn btn-info">Discover now</button>
        </div>
    </div>


    <div class="image-container">
        <img src="..\Images\homePage\streetwear.jpg" alt="Descripción de la imagen">
        <div class="overlay-text">
            Go Streetwear!
            <br>
            <button type="button" class="btn btn-info">Discover now</button>
        </div>
    </div>



</main>
<?php include 'dependences_php/footImport.php'; ?>
<script src="../JS/connectedPeople.js"></script>
</body>

</html>