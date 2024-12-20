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

        return $articles;
}

function removeSpaces($str) {
    return str_replace(' ', '', $str);  // Replace spaces with an empty string
}

$imageURI = "../Images/articles/streetWear/";

$articles = getInfoArticles($pdo);


?>

<main>

<br>

<div class="d-flex justify-content-center align-items-center full-height">
            <div class="text-center">
                <h1><strong>All articles</strong></h1>
            </div>
</div>



<div class="container text-center">


  <div class="row">

        <?php foreach ($articles as $article): ?>
            
            <div class="card" style="width:200px;margin:10px">
                
                <img src= <?php echo $imageURI . removeSpaces(htmlspecialchars($article['name'])) . ".png";?> class="card-img-top" alt="...">
                <div class="card-body" >
                <h5 class="card-title"><?php echo htmlspecialchars($article['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($article['price']); ?>€</p>

                
                <div class="container text-center" style="width:150px;padding:0px;margin:0px" >

                <div class="row align-items-start" style="padding:0px;margin:0px">

                <div class="col" style="padding:0px;margin:0px">
                <button class="btn btn-outline-secondary" style="width:30px;height:30px;display: flex;align-items: center" type="button" id="decrease">-</button>
                </div>
                    
                <div class="col" style="padding:0px;margin:0px">
                <input class="form-control text-center" type="number" style="width:50px"  value="1" min="1" id="quantityInput">
                </div>
                
                <div class="col" style="padding:0px;margin:0px">
                <button class="btn btn-outline-secondary" style="width:30px;height:30px;display: flex;align-items: center" type="button" id="increase">+</button>
        
                </div>
                
                </div>

                </div>


                <br>
                <a href="#" class="btn btn-primary">To shopping cart</a>

                
                </div>
            </div>
        <?php endforeach; ?>


</div>
</div>


</main>



<?php include 'dependences_php/footImport.php'; ?>

</body>
</html>