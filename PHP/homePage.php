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


<div class="container mt-5">
    <div id="sneakerCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#sneakerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#sneakerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#sneakerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..\Images\articles\streetWear\AdidasUltraBoost.png" class="d-block w-100 carousel-image" alt="Sneaker 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sneaker 1</h5>
                    <p>Classic white sneaker with a modern touch.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..\Images\articles\streetWear\AsicsGel-Kayano26.png" class="d-block w-100 carousel-image" alt="Sneaker 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sneaker 2</h5>
                    <p>Stylish black sneaker for all occasions.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..\Images\articles\streetWear\NikeAirMax.png" class="d-block w-100 carousel-image" alt="Sneaker 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sneaker 3</h5>
                    <p>Bright and white sneaker for a classic look.</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#sneakerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sneakerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>









</main>
<?php include 'dependences_php/footImport.php'; ?>
<script src="../JS/connectedPeople.js"></script>
</body>

</html>