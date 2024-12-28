<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "dependences_php/security.php";
$title = "CheckOut";
include 'dependences_php/headImport.php';

if (!isset($_SESSION['totalPrice'])) {
    $_SESSION['totalPrice'] = 0;
}


?>


<main>
<div class="container text-center">
    
    <h1>Order check out</h1>
<div class="row">

        <div class="col">

        <h3>Select shipment method</h3>


        <div style="border: 2px solid gray;border-radius:15px;padding:10px">
            <div class="form-check">

            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                PDP method-2.99€
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                DHL method-22.99€
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                DHL express method-+44€
            </label>
            </div>

            </div>

            <br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    I have read and accepted the data protection and privacy policies
                </label>
            </div>

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
            <td class="right-align" id="finalPrice"> <?php echo $_SESSION['totalPrice']?> €</td>
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

        <a href="checkOut.php" class="btn btn-primary" id="toOrder">Pay</a> 

        <br>
        <br>

        </div>



    </div>



</div>

<?php include 'dependences_php/footImport.php';?>


</body>
</html>