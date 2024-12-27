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

    $_SESSION['user_id'] = 3;

    $amount = $_POST['amount'];
    $userId = $_SESSION['user_id'];
    $articleId = $_POST['articleid']; 

    $stmt = $pdo->prepare('INSERT INTO userarticle (quantity,IDuser,idarticle) VALUES (?,?,?)');
    $stmt->execute([$amount,$userId,$articleId]);
    

    // Devolver solo el JSON necesario
    echo json_encode(['cartCount' => $_SESSION['cart']]);
    exit; // Termina el script para no agregar HTML accidentalmente
}

// Si no es una petición válida, devuelve un error
http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
?>
