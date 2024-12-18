<?php
session_start();
$title = "AllArticles";
include 'dependences_php/headImport.php';
include 'database.php';


function getInfoArticles($pdo){

        // Query to fetch all items from the articles table
        $query = "SELECT * FROM articles";
        $stmt = $pdo->query($query);
    
        // Fetch all results as an associative array
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Display results
        foreach ($articles as $article) {
            echo "ID: " . $article['idarticle'] . "<br>";
            echo "Name: " . $article['name'] . "<br>";
            echo "Price: $" . $article['price'] . "<br>";
            echo "Stock: " . $article['stock'] . "<br>";
            echo "Description: " . $article['description'] . "<br><br>";
        }

        return $articles
}



$articles = getInfoArticles($pdo);


?>


<div class="d-flex justify-content-center align-items-center full-height">
            <div class="text-center">
                <h1><strong>All articles</strong></h1>
            </div>
</div>



<div class="container text-center">


  <div class="row">
    
    <div class="card" style="width:200px">
    <img src="../Images/articles/streetWear/AirMaxPlus.png" class="card-img-top" alt="...">

    <div class="card-body" >
    <h5 class="card-title">Air Max Plus</h5>
    <p class="card-text">70.00€</p>
    <a href="#" class="btn btn-primary">To shopping cart</a>
  
    </div>

    </div>


    <div class="card" style="width:200px">
    <img src="../Images/articles/streetWear/AirForce.png" class="card-img-top" alt="...">

    <div class="card-body">
    <h5 class="card-title">Air Force</h5>
    <p class="card-text">79.99€</p>
    <a href="#" class="btn btn-primary">To shopping cart</a>
  
    </div>

    </div>

    <div class="card" style="width:200px">
    <img src="../Images/articles/streetWear/Converse.jpg" class="card-img-top" alt="...">

    <div class="card-body">
    <h5 class="card-title">Chuck Taylor All Star Embroidered Stars</h5>
    <p class="card-text">85.99€</p>
    <a href="#" class="btn btn-primary">To shoping cart</a>
  
    </div>

    </div>


</div>
</div>


</main>



<?php include 'dependences_php/footImport.php'; ?>

</body>
</html>