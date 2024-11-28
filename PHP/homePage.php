<?php
session_start();
$title = "UrbanKicks";
include 'headImport.php';
?>
<main>

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
<?php include 'footImport.php'; ?>
<body>

</body>

</html>