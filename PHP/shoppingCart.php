<?php
session_start();
$title = "Shopping Cart";
include 'headImport.php';
?>
<main>

<div class="d-flex justify-content-center align-items-center full-height">
            <div class="text-center">
                <h1><strong>Shopping cart</strong></h1>
            </div>
</div>




<div class="container text-center">
    <div class="row">

        <div class="col">

        <h3><strong>Your cart is empty!</strong></h3>

        </div>

        <div class="col">
        <h5>Order overview</h5>
        <table class="table">
        <tr>
            <th>Concept</th>
            <th class="right-align">Monto</th>
        </tr>

        <tr>
            <td>Subtotal</td>
            <td class="right-align">0.00 €</td>
        </tr>
        <tr>
            <td>Shipment</td>
            <td class="right-align">0.00 €</td>
        </tr>
        <tr>
            <td>IVA Included</td>
            <td class="right-align">0.00 €</td>
        </tr>
        <tr class="table-dark">
            <td>Estimated total amount</td>
            <td class="right-align">0.00 €</td>
        </tr>

        </table>

        </div>


    </div>

</div>

</main>

<?php include 'footImport.php'; ?>

</body>
</html>