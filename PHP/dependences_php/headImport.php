<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "database.php";


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = 0;
}

$_SESSION['user_id'] = 1;

if (isset($_SESSION['user_id'])){
$_SESSION['user_id'] = 1;
$user = $_SESSION['user_id'];



function getNumArticles($pdo,$user){

    // Query to fetch all items from the articles table
    $query = "SELECT * FROM userarticle WHERE IDuser = $user";
    $stmt = $pdo->query($query);

    // Fetch all results as an associative array
    $articlesUser = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $articlesUser;
}


$articlesUser = getNumArticles($pdo,$user);
$totalArticles = 0;

foreach ($articlesUser as $article):

    $totalArticles += $article['quantity'];

endforeach;

$_SESSION['cart'] = $totalArticles;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="..\CSS\styles.css">
    <link rel="stylesheet" href="..\CSS\bootstrap\css\bootstrap.min.css">
    <link rel="icon" href="../images/iconsWebshop/favicon.png" type="image/png">
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="homePage.php">
            <img src="../Images/iconsWebshop\logo.jpg" alt="Snickers Logo" style="width: 200px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'home') ? 'active' : ''; ?>" href="homePage.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($activePage == 'articles') ? 'active' : ''; ?>"
                        href="allArticles.php" role="button" data-bs-toggle="dropdown">
                        Shop
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="allArticles.php">All Articles</a></li>
                        <li><a class="dropdown-item" href="newArrivals.php">New Arrivals</a></li>
                        <li><a class="dropdown-item" href="streetWear.php">Street Wear</a></li>
                        <li><a class="dropdown-item" href="basketBall.php">Basketball</a></li>
                    </ul>
                </li>
              

                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'contact') ? 'active' : ''; ?>" href="shoppingCart.php">
                        <img src="../Images/iconsWebShop/shoppingcart.png" style="width: 30px;height: 30px" alt="Shopping cart">
                        <span class="badge badge-light" id="cartCount"><?php echo $_SESSION['cart']?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'contact') ? 'active' : ''; ?>" href="myOrders.php">My orders</a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'contact') ? 'active' : ''; ?>" href="logout.php">Log out</a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>

</header>