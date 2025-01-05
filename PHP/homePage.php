<?php
session_start();
include "dependences_php/security.php";
$title = "UrbanKicks";
include 'dependences_php/headImport.php';
?>
<main>
<div>
        <h2>Usuarios Conectados: <span id="connected-count">0</span></h2>
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
<script src="dependences_php/connectedUsers.js"></script>
</body>

</html>