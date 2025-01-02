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
    <form id="deliveryForm" method="POST" action="thankyou.php">
        <div class="row">

            <!-- Shipment Method -->
            <div class="col">
                <h3>Select shipment method</h3>
                <div  style="border: 2px solid gray; border-radius: 15px; padding: 10px;">
                    <!-- Option 1 -->
                    <input class="form-check-input" type="radio" name="shippingMethod" id="pdpMethod" value="2.99" required>
                    <label class="form-check-label" for="pdpMethod">
                        PDP method - 2.99€
                    </label>
                    <br>

                    <!-- Option 2 -->
                    <input class="form-check-input" type="radio" name="shippingMethod" id="dhlMethod" value="22.99">
                    <label class="form-check-label" for="dhlMethod">
                        DHL method - 22.99€
                    </label>
                    <br>

                    <!-- Option 3 -->
                    <input class="form-check-input" type="radio" name="shippingMethod" id="dhlExpressMethod" value="44.00">
                    <label class="form-check-label" for="dhlExpressMethod">
                        DHL express method - 44.00€
                    </label>
                    <br>
                </div>
                <br>

                <!-- Checkbox -->
                <input class="form-check-input" type="checkbox" id="termsCheckbox" required>
                <label class="form-check-label" for="termsCheckbox">
                I confirm that I have read, understood, and accepted the data protection policy
                </label>
                <br><br>
            </div>

            <!-- Order Overview -->
            <div class="col">
                <h5>Order overview</h5>
                <table class="table">
                    <tr>
                        <th>Concept</th>
                        <th class="right-align">Amount</th>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td class="right-align" id="finalPrice"> <?php echo $_SESSION['totalPrice']?> €</td>
                    </tr>
                    <tr>
                        <td>Shipment</td>
                        <td class="right-align" id="shippingCost">0.00 €</td>
                    </tr>
                    <tr class="table-dark">
                        <td>Estimated total amount</td>
                        <td class="right-align" id="totalAmount"> <?php echo $_SESSION['totalPrice']?> €</td>
                    </tr>
                </table>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" id="toOrder">Pay</button>
                

            </div>
        </div>
    </form>
</div>

<br><br>

<?php include 'dependences_php/footImport.php';?>

</main>

<script>
    // Update shipping cost and total amount dynamically
    const shippingMethods = document.querySelectorAll('input[name="shippingMethod"]');
    const finalPrice = parseFloat(<?php echo $_SESSION['totalPrice']; ?>);
    const shippingCostElement = document.getElementById('shippingCost');
    const totalAmountElement = document.getElementById('totalAmount');

    shippingMethods.forEach(method => {
        method.addEventListener('change', function () {
            const shippingCost = parseFloat(this.value);
            const totalAmount = finalPrice + shippingCost;

            // Update values in the table
            shippingCostElement.textContent = shippingCost.toFixed(2) + " €";
            totalAmountElement.textContent = totalAmount.toFixed(2) + " €";
        });
    });

    document.getElementById('deliveryForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form from submitting traditionally

    // Collect form data
    const formData = new FormData(this); // Captures all form fields
    formData.append('action', 'createOrder'); // Adds 'action=createOrder'

    // Send AJAX request
    fetch('dependences_php/createOrder.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Expecting JSON response
    .then(data => {
            
        const params = new URLSearchParams();
        params.append('action', 'sendEmail');
        params.append('orderid', data.orderId);

            
            return fetch('orderMail.php', {
            method: 'POST',
            body: params
        });
    })
    .then(response => response.json()) // Handle second response (sending email)
    .then(data => {
        if (!data.status == "success") {
            throw new Error('Email sending failed');
        }

        window.location.href = 'thankyou.php'; // Redirect if all is successful
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while processing your order.');
    });
});


</script>
</body>
</html>
