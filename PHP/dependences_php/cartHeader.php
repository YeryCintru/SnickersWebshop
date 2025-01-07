<?php 
include "database.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = 0;
}

//$_SESSION['user_id'] = 1;

if (isset($_SESSION['user_id'])) {
  //  $_SESSION['user_id'] = 1;
    $user = $_SESSION['user_id'];

    function getNumArticles($pdo, $user)
    {

        // Query to fetch all items from the articles table
        $query = "SELECT * FROM userarticle WHERE IDuser = $user";
        $stmt = $pdo->query($query);

        // Fetch all results as an associative array
        $articlesUser = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articlesUser;
    }

    $articlesUser = getNumArticles($pdo, $user);
    $totalArticles = 0;

    foreach ($articlesUser as $article):

        $totalArticles += $article['quantity'];

    endforeach;

    $_SESSION['cart'] = $totalArticles;

}
?>