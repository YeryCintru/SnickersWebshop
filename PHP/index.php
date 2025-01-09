<?php
session_start();
$title = "Snickers Login";
include "dependences_php/checkLogin.php";
include 'dependences_php/headImport.php';

?>

<main>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7 text-center">
            <h1>Welcome to Urbankicks!</h1>
            <p>Log in to access our exclusive offers</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" id="loginForm">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" required>                    
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <input type="hidden" name="screenResolution" id="screenResolution">
                <input type="hidden" name="operatingSystem" id="operatingSystem">
                <button type="submit" class="btn btn-primary w-100">Log In</button>

                <!-- Display error message below the submit button -->
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo "<div class='error-message mt-3' style='color: red; font-weight: bold; text-align: center;'>" . $_SESSION['error_message'] . "</div>";
                    unset($_SESSION['error_message']); // Clear the message after it is displayed
                }
                ?>
            </form>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <p>Don't have an account yet? <a href="register.php">Sign up here</a></p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <p>Forgot password? <a href="forgotPassword.php">Click here</a></p>
        </div>
    </div>
</main>
    <?php include 'dependences_php/footImport.php'; ?>
    <script src="..\JS\validationLogin.js" defer></script>
</body>

</html>