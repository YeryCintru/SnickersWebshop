<?php
session_start();
$title = "Contact";
include 'headImport.php';
?>
    <main>

        <div class="d-flex justify-content-center align-items-center full-height">
            <div class="text-center">
                <h1><strong>Contact!</strong></h1>
                <h3>Before writing us look for frequent questions:)</h3>
            </div>
        </div>

        <div class="accordion mx-auto" id="accordionPanelsStayOpenExample" style="width: 50%;">
            <!-- Accordion Item #1 - Shipping and Delivery -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Shipping and Delivery
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>How long does shipping take?</strong><br>
                                Delivery times vary depending on your location. Generally, orders are processed within
                                1-3 business days, with delivery typically taking 5-7 business days. International
                                shipping may take longer.</li>
                            <li><strong>Do you offer free shipping?</strong><br>
                                Yes, we offer free standard shipping on orders over $50. Please check the shipping
                                policy for more details about eligibility.</li>
                            <li><strong>Can I track my order?</strong><br>
                                Yes, you will receive a tracking number via email once your order has been shipped. You
                                can track your package through the courier's website.</li>
                            <li><strong>Can I change my shipping address after placing an order?</strong><br>
                                We strive to process orders quickly, so it’s important to make sure your shipping
                                address is correct when you place your order. If you need to update the address, please
                                contact us immediately, and we will do our best to assist you.</li>
                            <li><strong>Do you ship internationally?</strong><br>
                                Yes, we offer international shipping to many countries. Please review our international
                                shipping section to see if we ship to your location.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item #2 - Returns and Refunds -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Returns and Refunds
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>What is your return policy?</strong><br>
                                We accept returns within 30 days of receiving your order. Items must be unused and in
                                their original condition. Please visit our returns page for further details.</li>
                            <li><strong>How can I return an item?</strong><br>
                                To return an item, please contact our customer support team to receive a return
                                authorization number. We’ll guide you through the process of returning the item.</li>
                            <li><strong>How long does it take to receive a refund?</strong><br>
                                Refunds are typically processed within 5-7 business days after we receive the returned
                                item. You will be notified via email once the refund has been processed.</li>
                            <li><strong>Do I have to pay for return shipping?</strong><br>
                                In most cases, return shipping is at the customer's expense unless the product is
                                defective or damaged upon arrival. For more details, check our returns policy.</li>
                            <li><strong>Can I exchange my product instead of returning it?</strong><br>
                                Yes, we offer exchanges for items that are damaged or the wrong size. Please contact us
                                for assistance with exchanges.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item #3 - Product Information -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Product Information
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>How do I know if a product is available?</strong><br>
                                Products listed on our site are generally in stock. If an item is out of stock, the
                                product page will reflect that status, and you can sign up for restock notifications.
                            </li>
                            <li><strong>Can I pre-order out-of-stock products?</strong><br>
                                Yes, some of our products are available for pre-order. If pre-ordering is available, it
                                will be indicated on the product page.</li>
                            <li><strong>Are product images accurate?</strong><br>
                                We ensure all product images are accurate, but the colors may vary slightly due to
                                monitor settings. For more details, please check the product descriptions.</li>
                            <li><strong>Do you offer product warranties?</strong><br>
                                Many of our products come with a manufacturer's warranty. Details about warranties can
                                be found on the individual product pages.</li>
                            <li><strong>Can I request a specific brand or model?</strong><br>
                                If you’re looking for a specific brand or model, please contact our support team, and
                                we’ll check availability or help you find something similar.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item #4 - Payment and Security -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFour">
                        Payment and Security
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>What payment methods do you accept?</strong><br>
                                We accept all major credit and debit cards, PayPal, Apple Pay, and Google Pay. For
                                additional payment options, please visit our payment page.</li>
                            <li><strong>Is my payment information secure?</strong><br>
                                Yes, we use SSL encryption technology to ensure your payment details are securely
                                processed and protected during the checkout process.</li>
                            <li><strong>Can I use multiple payment methods for a single order?</strong><br>
                                Currently, we only accept one payment method per order. If you need assistance, please
                                contact customer service.</li>
                            <li><strong>Are my personal details protected?</strong><br>
                                Yes, we take privacy seriously and protect your personal information with
                                industry-standard security measures. We do not share your details with third parties.
                            </li>
                            <li><strong>Can I change my payment method after placing the order?</strong><br>
                                If your order has not been processed yet, we can assist you with changing your payment
                                method. Please contact us immediately for help.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item #5 - Account and Orders -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFive">
                        Account and Orders
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>How do I create an account?</strong><br>
                                To create an account, click on the "Sign Up" button at the top of the page and fill in
                                your details. You’ll be able to track your orders and save your preferences.</li>
                            <li><strong>Can I modify my order after placing it?</strong><br>
                                Once an order is placed, it is processed quickly, but if you need to modify it, please
                                contact us immediately, and we will try to accommodate your request.</li>
                            <li><strong>How do I track my order?</strong><br>
                                You can track your order by logging into your account or by using the tracking link sent
                                to you via email.</li>
                            <li><strong>What do I do if I forgot my password?</strong><br>
                                If you’ve forgotten your password, click on the "Forgot Password" link during login to
                                reset it.</li>
                            <li><strong>Can I check out as a guest?</strong><br>
                                Yes, you can check out without creating an account. However, creating an account allows
                                you to track orders and save your shipping information for future purchases.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item #6 - Discounts and Offers -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseSix">
                        Discounts and Offers
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>How can I use a discount code?</strong><br>
                                Enter the discount code during checkout in the "Apply Coupon" box. Your discount will be
                                applied immediately.</li>
                            <li><strong>Are there any seasonal discounts?</strong><br>
                                Yes, we offer seasonal sales throughout the year. Make sure to subscribe to our
                                newsletter to stay informed about upcoming promotions.</li>
                            <li><strong>Can I combine multiple discounts?</strong><br>
                                Discounts cannot be combined unless stated otherwise in the offer details. Each
                                promotion is valid for a specific time frame.</li>
                            <li><strong>Do you offer student discounts?</strong><br>
                                We offer student discounts occasionally. Please sign up for our newsletter or check our
                                student offers page for more information.</li>
                            <li><strong>How can I get notified about new offers?</strong><br>
                                You can subscribe to our newsletter, and we’ll send you updates on exclusive offers and
                                promotions directly to your inbox.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item #7 - Customer Service -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseSeven">
                        Customer Service
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>How can I contact customer service?</strong><br>
                                You can reach our customer service team by emailing support@example.com or through our
                                contact form on the website.</li>
                            <li><strong>What are your customer service hours?</strong><br>
                                Our customer service team is available Monday through Friday from 9 AM to 6 PM. We will
                                respond to all inquiries as soon as possible.</li>
                            <li><strong>Can I get personalized assistance with my order?</strong><br>
                                Yes! Our customer support team can assist you with personalized recommendations or any
                                questions you have about your order.</li>
                            <li><strong>Do you offer gift cards?</strong><br>
                                Yes, we offer gift cards in various denominations. You can purchase them directly on our
                                website or contact customer service for assistance.</li>
                            <li><strong>Can I request a product demo?</strong><br>
                                If you're interested in a product demo, please contact us, and we’ll arrange a virtual
                                or in-store demonstration.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        </div>


        <div class="row justify-content-center align-items-center">
            <div class="col-md-7 text-center"> <!-- Centrado del título -->
                <h1>Maybe you want to write us :)</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            required>
                        <div id="emailHelp" class="form-text">Enter your email address</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputProblem1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleInputProblem1" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputDescription1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleInputDescription1" rows="3" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </main>

    <?php include 'footImport.php'; ?>
</body>

</html>