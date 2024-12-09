<?php
session_start();
$title = "Snickers Register";
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

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>

                <div class="mb-3">
                    <label for="repeatPassword" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" id="repeat_password" name="repeat_password" >
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <?php include "dependences_php/checkRegister.php"; ?>


        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <p>Do you have already an account? <a href="index.php">Sign in here</a></p>
            </div>

        </div>
    </div>


</main>
<?php include 'dependences_php/footImport.php'; ?>
<script src="..\JS\validation.js" defer></script>
</body>

</html>