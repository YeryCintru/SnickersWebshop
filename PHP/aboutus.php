<?php
session_start();
$title = "About Us";
include 'headImport.php';
?>

<main>

<div class="d-flex justify-content-center align-items-center full-height">
            <div class="text-center">
                <h1><strong>About us</strong></h1>
            </div>
</div>

<br>
<br>

<div class="container text-center">
  <div class="row">

    <div class="col">
        
    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
        <button type="button" class="btn btn-primary">About us</button>
        <button type="button" class="btn btn-primary">Privacy policy and terms and conditions</button>
        <button type="button" class="btn btn-primary">Privacy and coockie policy</button>
    </div>


    </div>
    <div class="coll">


          
                
    <div class="grid text-center" style="--bs-rows: 3; --bs-columns: 3">

    <div class="g-start-2" style="grid-row: 2">

    <div id="carouselExampleFade" class="carousel slide carousel-fade">

    <div class="carousel-inner"  style="border-radius: 15px">
    <div class="carousel-item active">
    <img src="..\Images\basketball.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="..\Images\streetwear.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="..\Images\imageHomePage.jpg" class="d-block w-100" alt="...">
    </div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div>


</div>

<div class="g-start-3" style="grid-row: 3">


<p>At UrbanKicks, we bring the streets to your feet. Our passion for urban style drives us to curate the latest and most unique footwear collections, blending comfort, quality, and edge. From classic streetwear staples to fresh, innovative designs, our shoes are crafted to keep you moving in style. Whether you’re stepping into the everyday or standing out at night, UrbanKicks is where style meets the street.</p>
</div>


</div>




   
    </div>


  </div>
</div>


</main>


<?php include 'footImport.php'; ?>

</body>
</html>
