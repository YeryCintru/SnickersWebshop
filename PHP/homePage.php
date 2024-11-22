<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanKicks</title>
    <link rel="stylesheet" href="..\CSS\styles.css">
    <link rel="stylesheet" href="..\CSS\bootstrap\css\bootstrap.min.css">
</head>
<?php include 'header.php'; ?>
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
<?php include 'footer.php'; ?>
<script src="..\JS\bootstrap\js\bootstrap.bundle.min.js"></script>
<body>

</body>

</html>