<?php
session_start();
$title = "Snickers Register";
include "dependences_php/checkRegister.php"; 

include 'dependences_php/headImport.php';
?>
<main>
    <div class="row justify-content-center">
        <div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7 text-center">
                    <h1>Welcome to Snickers Webshop</h1>
                    <p>Register to join this amazing shop!</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Display the error message if it exists -->
            <?php if (isset($_SESSION['email_error'])): ?>
                <div class="alert alert-danger">
                    <?php
                    // Show the error message and then clear it from the session
                    echo $_SESSION['email_error'];
                    unset($_SESSION['email_error']);
                    ?>
                </div>
            <?php endif; ?>

            <!-- Registration form -->
            <form method="POST" id="signupForm">
                <div class="mb-3">
                    <label for="InputFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>

                <div class="mb-3">
                    <label for="InputLastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <p>Do you have already an account? <a href="index.php">Sign in here</a></p>
            </div>
        </div>
    </div>
</main>


<?php include 'dependences_php/footImport.php'; ?>
<script src="..\JS\validationRegister.js" defer></script>
</body>

</html>