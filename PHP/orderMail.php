<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Initialize the variables
    $to = 'yerynavas@gmail.com';
    $invoiceNumber = null;
    $product = null;//Name of the product
    $price = null;
    $total = null;

    $subject = "Invoice #$invoiceNumber";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Urbankicks <no-reply@urbankicks.com>' . "\r\n";

    // HTML Email Content
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
      <title>Invoice #$invoiceNumber</title>
    </head>
    <body>
      <h1>Invoice #$invoiceNumber</h1>
      <p>Dear Customer,</p>
      <p>Thank you for your purchase. Please find your invoice details below:</p>
      <ul>
        <li>Product: $product</li>
        <li>Price: $price</li>
        <li>Total: $total</li>
      </ul>
      <p>For any questions, contact support@urbankicks.com.</p>
    </body>
    </html>
    ";

    // Send Email
    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Email sent successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
