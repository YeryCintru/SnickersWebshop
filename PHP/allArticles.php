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

                
                <div class="container text-center" style="width:150px;padding:0;margin:0;">
                <div class="row align-items-center g-0"> <!-- 'g-0' elimina espacios entre columnas -->
            
                <!-- Botón disminuir -->
            <div class="col d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-secondary p-0" style="width:30px;height:30px;" type="button" id="decrease-<?php echo  $article['idarticle']?>">-</button>
            </div>


            <!-- Input -->
            <div class="col d-flex justify-content-center align-items-center" style="padding:0px">
                <input type="number"  style="width:40px;height:30px;border-radius:5px;text-align:center;"  value="0" min="0" id="quantityInput-<?php echo  $article['idarticle']?>">
            </div>


            <!-- Botón aumentar -->
            <div class="col d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-secondary p-0" style="width:30px;height:30px;" type="button" id="increase-<?php echo  $article['idarticle']?>">+</button>
                </div>
             </div>
         </div>



                <br>
                <a href="#" class="btn btn-primary" id="toCart-<?php echo  $article['idarticle']?>">To shopping cart</a>    
                </div>
            </div>

            <script>
                const decrease<?php echo $article['idarticle']?> = document.getElementById('decrease-<?php echo  $article['idarticle']?>');
                const increase<?php echo $article['idarticle']?> = document.getElementById('increase-<?php echo  $article['idarticle']?>');
                const number<?php echo  $article['idarticle']?> = document.getElementById('quantityInput-<?php echo  $article['idarticle']?>');
                  

                    /**
                     * function to decrease when clicking
                     */

                     decrease<?php echo  $article['idarticle']?>.addEventListener('click',() => {
                        let value = parseInt(number<?php echo  $article['idarticle']?>.value);
                        if(value > 0){
                        number<?php echo  $article['idarticle']?>.value = value - 1;  
                        }         
                     });


                     /**
                      * Event listener to increase
                      */
                     increase<?php echo  $article['idarticle']?>.addEventListener('click',() => {
                        let value = parseInt(number<?php echo  $article['idarticle']?>.value);
                        number<?php echo  $article['idarticle']?>.value = value + 1;
                     });


                document.addEventListener('DOMContentLoaded', function () {
                const toCart<?php echo  $article['idarticle']?> = document.getElementById('toCart-<?php echo  $article['idarticle']?>');

                toCart<?php echo  $article['idarticle']?>.addEventListener('click', function () {
                // Solicitud AJAX
                fetch('dependences_php/updateCart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'action=updateCart&amount='+ number<?php echo  $article['idarticle']?>.value + '&articleid=' + <?php echo htmlspecialchars($article['idarticle']); ?>
                    })
                .then(response => response.json())
                .then(data => {
                    // Aquí actualizamos el valor del carrito en el otro archivo
                    document.getElementById('cartCount').innerHTML = data.cartCount;
                })
                .catch(error => console.error('Error:', error));
            });

        });

            </script>
        <?php endforeach; ?>


</div>
</div>


</main>







<?php include 'dependences_php/footImport.php'; ?>

</body>
</html>