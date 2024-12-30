<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "dependences_php/security.php";
include 'dependences_php/headImport.php';


$_SESSION['totalPrice'] = 0;

include 'database.php';

$user = $_SESSION['user_id'];

function getInfoOrders($pdo,$user){

        // Query to fetch all items from the articles table
        $query = "SELECT * FROM orders WHERE IDuser = $user";
        $stmt = $pdo->query($query);
    
        // Fetch all results as an associative array
        $articlesUser = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $articlesUser;

}

function getInfoOrderArticle($pdo,$order){

    // Query to fetch all items from the articles table
    $query = "SELECT * FROM orders NATURAL JOIN orderarticle NATURAL JOIN articles WHERE idorder = $order";
    $stmt = $pdo->query($query);

    // Fetch all results as an associative array
    $articlesOrder = $stmt->fetchAll(PDO::FETCH_ASSOC);


    return $articlesOrder;

}

function removeSpaces($str) {
    return str_replace(' ', '', $str);  // Replace spaces with an empty string
}


$articlesOrder = getInfoOrders($pdo,$user);
$imageURI = "../Images/articles/streetWear/";
$totalPrice = 0;
?>


<main>

<table class="table" style="border-radius:15px">
       
        <tr>
            <th>ID of the order</th>
            <th>Date</th>
            <th>Shipment type</th>
            <th>Price</th>
            <th>Order again</th>
        </tr>

<?php foreach ($articlesOrder as $order): 
    $totalPrice = 0;
    ?>   




<tr>
    
<td>
    <div class="accordion" id="accordionExample">
  
    <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Order: <?php echo $order['idorder'] ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
              <?php  
              
              $articleOrder = getInfoOrderArticle($pdo,$order['idorder']); 
            
              foreach($articleOrder as $article):

                $totalPrice += $article['price'] * $article['quantity'];

                ?>

            <p><img style="width:80px;height:80px;border-radius:15px" src= <?php echo $imageURI . removeSpaces(htmlspecialchars($article['name'])) . ".png";?>> <?php echo $article['name']; ?>, x <?php echo $article['quantity']; ?></p>


                <?php endforeach;?>


              
    </div>
    </div>
  </div>
  </div>

  </td>

  <td><?php echo $order['dateorder'] ?></td>

  <td>none</td>
  <td> <?php echo $totalPrice ?> € </td>

  <td><a href="#" class="btn btn-primary" id="orderAgain-<?php echo  $order['idorder']?>">Order again!</a> </td>
  
</tr>



<script>
    
    document.addEventListener('DOMContentLoaded', function () {
                const orderAgain<?php echo  $order['idorder']?> = document.getElementById('orderAgain-<?php echo  $order['idorder']?>');

                orderAgain<?php echo  $article['idorder']?>.addEventListener('click', function () {
                // Solicitud AJAX
                fetch('dependences_php/createOrder.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'action=orderAgain&orderId=' + <?php echo  $order['idorder']?>
                    })
                .then(response => response.json())
                .then(data => {
                    // Aquí actualizamos el valor del carrito en el otro archivo
                    window.location.href = 'thankyou.php'; // Redirect if needed
                })
                .catch(error => console.error('Error:', error));

            });

        });

</script>


<?php endforeach; ?>

</table>


</main>

<?php include 'dependences_php/footImport.php';?>



</body>


</html>
