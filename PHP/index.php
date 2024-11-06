<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snickers Login</title>
    <!--Poner foto-->
    <link rel="stylesheet" href="..\CSS\styles.css">
    <link rel="stylesheet" href="..\CSS\bootstrap\css\bootstrap.min.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7 text-center"> <!-- Añadido text-center -->
                    <h1>Welcome to Snickers Webshop</h1>
                    <p>Log in to access our exclusive offers</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center"> <!-- Centrar la fila -->

            <div class="col-md-4">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
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



    <?php include 'footer.php'; ?>
</body>

</html>