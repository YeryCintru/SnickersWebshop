<?php
session_start();
$title = "Snickers Login";
include 'dependences_php/headImport.php';
include "dependences_php/checkLogin.php";

if (isset($_SESSION['user_id'])) {
    header('Location: homePage.php'); 
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = 0;
}

if (!isset($_SESSION['totalPrice'])) {
    $_SESSION['totalPrice'] = 0;
}

?>

    <main>
        <div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7 text-center"> <!-- Añadido text-center -->
                    <h1>Welcome to Urbankicks!</h1>
                    <p>Log in to access our exclusive offers</p>
                </div>
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
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="hidden" name="screenResolution" id="screenResolution">
                    <input type="hidden" name="operatingSystem" id="operatingSystem">
                    <button type="submit" class="btn btn-primary">Submit</button>
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