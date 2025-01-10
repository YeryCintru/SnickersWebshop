<?php
session_start();
$title = "About Us";
include 'dependences_php/headImport.php';
?>

<main class="min-vh-50 d-flex flex-column justify-content-center align-items-center">
  <!-- Hero Section -->
    <h1 class="display-4 fw-bold">About Us</h1>

  <!-- Spacer -->
  <div class="py-4"></div>

  <!-- Content Section -->
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow border-0">
          <div class="card-body">
            <p class="fs-5">
              At UrbanKicks, we bring the streets to your feet. Our passion for urban style drives us to curate the
              latest and most unique footwear collections, blending comfort, quality, and edge. From classic streetwear
              staples to fresh, innovative designs, our shoes are crafted to keep you moving in style. Whether you’re
              stepping into the everyday or standing out at night, UrbanKicks is where style meets the street.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<?php include 'dependences_php/footImport.php'; ?>

</body>

</html>