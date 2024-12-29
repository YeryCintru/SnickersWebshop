<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../database.php';


// Asegúrate de devolver solo JSON
header('Content-Type: application/json');



if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'createOrder'){

    

}

?>