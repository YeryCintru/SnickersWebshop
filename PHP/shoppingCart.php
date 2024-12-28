<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$title = "Shopping Cart";
include 'dependences_php/headImport.php';

$_SESSION['totalPrice'] = 0;

include 'database.php';

$user = $_SESSION['user_id'];

function getInfoArticles($pdo,$user){

        // Query to fetch all items from the articles table
        $query = "SELECT * FROM userarticle NATURAL JOIN articles WHERE IDuser = $user";
        $stmt = $pdo->query($query);
    
        // Fetch all results as an associative array
        $articlesUser = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $articlesUser;

}

function removeSpaces($str) {
    return str_replace(' ', '', $str);  // Replace spaces with an empty string
}


$articlesUser = getInfoArticles($pdo,$user);
$imageURI = "../Images/articles/streetWear/";
$totalPrice = 0;
$newQuantity = 0;

?>
<main>

<div class="d-flex justify-content-center align-items-center full-height">
            <div class="text-center">
                <h1><strong>Shopping cart</strong></h1>
            </div>
</div>




<div class="container text-center">
    <div class="row">

        <div class="col">

        <h3><strong>Your cart:</strong></h3>

        <table class="table" style="border-radius:15px">
       
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    

        <?php foreach ($articlesUser as $article): ?>   

            <?php 
                $totalPrice +=  $article['price'] * $article['quantity'];
                $_SESSION['totalPrice'] +=  $article['price'] * $article['quantity'];
            ?>

            <tr>
            <td> <img style="width:80px;height:80px;border-radius:15px" src= <?php echo $imageURI . removeSpaces(htmlspecialchars($article['name'])) . ".png";?>>  <?php echo $article['name']?></td>
            <td><?php echo $article['price']?> €</td>
            <td  class="right-align">


            <div class="container text-center" style="width:150px;padding:0;margin:0;">
            <div class="row align-items-center g-0"> <!-- 'g-0' elimina espacios entre columnas -->
          
                <!-- Botón disminuir -->
                <div class="col d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-secondary p-0" style="width:30px;height:30px;" type="button" id="decrease-<?php echo  $article['idarticle']?>">-</button>
            </div>


            <!-- Input -->
            <div class="col d-flex justify-content-center align-items-center" style="padding:0px">
                <input type="number"  style="width:40px;height:30px;border-radius:5px;text-align:center;"  value="<?php echo $article['quantity']?>" min="0" id="quantityInput-<?php echo  $article['idarticle']?>" readonly>
            </div>


            <!-- Botón aumentar -->
            <div class="col d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-secondary p-0" style="width:30px;height:30px;" type="button" id="increase-<?php echo  $article['idarticle']?>">+</button>
                </div>

                </div>
            </div>


        
            </td>

            <td> 
                <p id="totalPrice-<?php echo  $article['idarticle']?>"><?php echo $article['quantity']?> x <?php echo $article['price']?> = <?php echo ($article['price'] * $article['quantity'])?>€</p>
            </td>

            </tr>
            



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
                        
                        
                        fetch('dependences_php/updateCart.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'action=modifyItem&amount=-1'+ '&articleid=' + <?php echo htmlspecialchars($article['idarticle']); ?>
                            })
                        .then(response => response.json())
                        .then(data => {
                            // Aquí actualizamos el valor del carrito en el otro archivo
                            document.getElementById('cartCount').innerHTML = data.cartCount;
                            document.getElementById('finalPrice').innerHTML = data.totalPrice + ' €';

                            
                           
                            document.getElementById('totalPrice-<?php echo  $article['idarticle']?>').innerHTML = data.amountArticle + ' x ' + <?php echo $article['price']?> + '=' + (<?php echo $article['price'] ?> * data.amountArticle)  + '€';

                        })
                        .catch(error => console.error('Error:', error));
                    }                        

                     });


                     /**
                      * Event listener to increase
                      */
                     increase<?php echo  $article['idarticle']?>.addEventListener('click',() => {
                        let value = parseInt(number<?php echo  $article['idarticle']?>.value);
                        number<?php echo  $article['idarticle']?>.value = value + 1;

                        fetch('dependences_php/updateCart.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'action=modifyItem&amount=1'+ '&articleid=' + <?php echo htmlspecialchars($article['idarticle']); ?>
                            })
                        .then(response => response.json())
                        .then(data => {
                            // Aquí actualizamos el valor del carrito en el otro archivo
                            document.getElementById('cartCount').innerHTML = data.cartCount;

                            document.getElementById('finalPrice').innerHTML = data.totalPrice + ' €';

                            

                            document.getElementById('totalPrice-<?php echo  $article['idarticle']?>').innerHTML = data.amountArticle + ' x ' + <?php echo $article['price']?> + '=' + (<?php echo $article['price'] ?> * data.amountArticle)  + '€';

                        })
                        .catch(error => console.error('Error:', error));
                        
                     });


        </script>


        <?php endforeach; ?>



        </table>




        </div>

        <div class="col">
        <h5>Order overview</h5>
        <table class="table">
        <tr>
            <th>Concept</th>
            <th class="right-align">Monto</th>
        </tr>

        <tr class="table-light">
            <td>Subtotal</td>
            <td class="right-align" id="finalPrice"><?php echo $totalPrice?> €</td>
        </tr>
    

        </table>

        <a href="checkOut.php" class="btn btn-primary" id="toOrder">To order</a> 

        </div>


    </div>

</div>

</main>

<?php include 'dependences_php/footImport.php'; ?>

</body>
</html>