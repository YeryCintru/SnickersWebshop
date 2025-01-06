<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../database.php';
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'createOrder'){

    $shipment = $_POST['shippingMethod'];
    $userId = $_SESSION['user_id'];


    //Add the order to the user
    $stmt = $pdo->prepare('INSERT INTO orders (IDuser,shipment) VALUES (?,?)');
    $stmt->execute([$userId,$shipment]);

    // Retrieve the last inserted ID
    $orderId = $pdo->lastInsertId();


    //Get all the articles selected by the user to add them to the query

        // Query to fetch all items from the articles table
        $query = "SELECT * FROM userarticle NATURAL JOIN articles WHERE IDuser = $userId";
        $stmt = $pdo->query($query);
    
        // Fetch all results as an associative array
        $articlesUser = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach($articlesUser as $article){

        $stmt = $pdo->prepare('INSERT INTO orderarticle (quantity,idorder,idarticle) VALUES (?,?,?)');
        $stmt->execute([$article['quantity'],$orderId,$article['idarticle']]);
        }

    echo json_encode(['orderId' => $orderId]);
    exit; 

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'orderAgain'){

    $orderId = $_POST['orderId'];
    $userId = $_SESSION['user_id'];


    //Add the order to the user
    $stmt = $pdo->prepare('INSERT INTO orders (IDuser,shipment) SELECT IDuser,shipment FROM orders WHERE idorder = ?');
    $stmt->execute([$orderId]);

    // Retrieve the last inserted ID
        $orderId2 = $pdo->lastInsertId();

        $stmt = $pdo->prepare('INSERT INTO orderarticle (quantity,idorder,idarticle) SELECT quantity,?,idarticle FROM orderarticle WHERE idorder = ?');
        $stmt->execute([$orderId2,$orderId]);
        

    echo json_encode(['orderId' => $orderId]);
    exit; 

}

?>