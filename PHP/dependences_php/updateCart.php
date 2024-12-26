<?php
session_start();

// Asegúrate de devolver solo JSON
header('Content-Type: application/json');

// Incrementar el contador del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'updateCart') {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = 0;
    }

    $_SESSION['cart'] += $_POST['amount'];

    // Devolver solo el JSON necesario
    echo json_encode(['cartCount' => $_SESSION['cart']]);
    exit; // Termina el script para no agregar HTML accidentalmente
}

// Si no es una petición válida, devuelve un error
http_response_code(400);
echo json_encode(['error' => 'Invalid request']);
?>
