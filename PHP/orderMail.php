<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require '../vendor/autoload.php'; // Include Composer dependencies


  include "database.php";
  $imageURI = "../Images/articles/streetWear/";


  function getShipmentMethod($price){
    switch($price){
      case 3:
        return "DPD method - 2.99€";
        break;

      case 23:
        return "DHL method - 22.99€";
      break;

      case 44:
        return "DHL express method - 44.00€";
      break;
    }
  }


  function removeSpaces($str) {
    return str_replace(' ', '', $str);  // Replace spaces with an empty string
}


function getInfoOrderArticle($pdo,$order){

    // Query to fetch all items from the articles table
    $query = "SELECT * FROM orders NATURAL JOIN orderarticle NATURAL JOIN articles WHERE idorder = $order";
    $stmt = $pdo->query($query);

    // Fetch all results as an associative array
    $articlesOrder = $stmt->fetchAll(PDO::FETCH_ASSOC);


    return $articlesOrder;

}


  // Asegúrate de devolver solo JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] == "sendEmail") {

  $mail = new PHPMailer(true);

  
  try {
    

    //Variables for the emails
    $number = $_POST['orderid'];
    $productName = 0;
    $productPrice = 0;
    $productQuantity = 0;
    $orderShipment = 0;
    $totalAmount = 0;

    $articles = getInfoOrderArticle($pdo,$number);


      // Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com'; // SMTP server
      $mail->SMTPAuth = true;
      $mail->Username = 'yerynavas@gmail.com'; // SMTP username
      $mail->Password = 'yvitbtqzlgldpkzq'; // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption
      $mail->Port = 587; // TCP port
  
      // Email content
      $mail->setFrom('no-reply@urbankicks.com', 'Urbankicks');
      $mail->addAddress('yerynavas@gmail.com'); // Recipient
      $mail->isHTML(true);
      $mail->Subject = "Invoice #$number";

    

    //Search in the order



      $mail->Body = "

      <h1>Invoice #$number</h1>
      <p>Dear Customer,</p>
      <p>Thank you for your purchase. Please find your invoice details below:</p>
      <h5>Items purchased:</h5>
      <ul>
      ";

      $totalPrice = 0;

      foreach($articles as $article){
        $shipment = $article['shipment'];
        $totalPrice += $article['price'] * $article['quantity'];
        $updatedURI = $imageURI . removeSpaces(htmlspecialchars($article['name'])) . ".png";
        $mail->Body .="<li> <img style='width:40px;height:40px;border-radius:15px' src= '$updatedURI'> Product:  {$article['name']} - Price: {$article['price']} € x {$article['quantity']}</li>";
      }

      $mail->Body .="</ul>";
      $totalPrice += $shipment;
      $shipment = getShipmentMethod($shipment);
      $mail->Body .= "<h5>Shipment method</h5> <p>$shipment</p> <h5>Total price</h5> <p><strong>$totalPrice €</strong></p> ";

          
      


      $mail->Body .="<p>For any questions, contact support@urbankicks.com.</p>";
  
      // Send email
      $mail->send();
      echo json_encode(['status' => 'success', 'message' => 'Email sent successfully!']);
  } catch (Exception $e) {
      echo json_encode(['status' => 'error', 'message' => "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
  }

}
  
?>
