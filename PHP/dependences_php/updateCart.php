<?php
session_start();
include '../database.php';

// Asegúrate de devolver solo JSON
header('Content-Type: application/json');


// Incrementar el contador del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'updateCart') {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = 0;
    }

    $_SESSION['cart'] += $_POST['amount'];


    //Code for the database integration

    $amount = $_POST['amount'];
    $userId = $_SESSION['user_id'];
    $articleId = $_POST['articleid']; 

    //Verify that the article is not yet in the basket

    $stmt = $pdo->prepare('SELECT * FROM userarticle WHERE IDuser = ? AND idarticle = ?');
    $stmt->execute([$userId, $articleId]);
    $row = $stmt->fetch();

    if($row){        
        $stmt = $pdo->prepare('UPDATE userarticle SET quantity = quantity + ? WHERE IDuser = ? AND idarticle = ?');
        $stmt->execute([$amount,$userId,$articleId]);
    


    }else{

    $stmt = $pdo->prepare('INSERT INTO userarticle (quantity,IDuser,idarticle) VALUES (?,?,?)');
    $stmt->execute([$amount,$userId,$articleId]);
    
    }
    

    // Devolver solo el JSON necesario
    echo json_encode(['cartCount' => $_SESSION['cart']]);
    exit; // Termina el script para no agregar HTML accidentalmente

}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'modifyItem') {

    $_SESSION['cart'] += $_POST['amount'];

    //We set the basic variables for the following operations
    $amount = $_POST['amount'];
    $userId = $_SESSION['user_id'];
    $articleId = $_POST['articleid']; 
    $totalPriceCart = 0;
    $amountArticle = 0;
    $currentAmount = $_POST['currentAmount'];
    

    //Code to eliminate the article if the amount is 0
    if(($currentAmount + $amount) <= 0){
        $stmt = $pdo->prepare('DELETE FROM userarticle WHERE IDuser = ? AND idarticle = ?');
        $stmt->execute([$userId,$articleId]);
    }


    //Here we sum the new quantity to the item in the database
    $stmt = $pdo->prepare('UPDATE userarticle SET quantity = quantity + ? WHERE IDuser = ? AND idarticle = ?');
    $stmt->execute([$amount,$userId,$articleId]);

    
    //Here we get the new toatl price updated
    $stmt = $pdo->prepare('SELECT SUM(quantity * price) AS totalPrice FROM userarticle NATURAL JOIN articles WHERE IDuser = ?');
    $stmt->execute([$userId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalPriceCart = $result['totalPrice'] ?? 0;

    //We set the price here
    $_SESSION['totalPrice'] = $totalPriceCart;


    //We return the new updated amount also here
    $stmt = $pdo->prepare('SELECT quantity FROM userarticle  WHERE IDuser = ? AND idarticle = ?');
    $stmt->execute([$userId,$articleId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $amountArticle = $result['quantity'] ?? 0;

    echo json_encode(['cartCount' => $_SESSION['cart'],
    'totalPrice' => $totalPriceCart,
    'amountArticle' => $amountArticle

    ]);
    exit; // Termina el script para no agregar HTML accidentalmente

}





// Si no es una petición válida, devuelve un error
http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
?>
