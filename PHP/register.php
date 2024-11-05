<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snickers Register</title>
    <!--Poner foto-->
    <link rel="stylesheet" href="..\CSS\styles.css">
    <link rel="stylesheet" href="..\CSS\bootstrap\css\bootstrap.min.css">
</head>
<body>
    <main>
    <?php include 'header.php'; ?>

        <div class="row justify-content-center"> <!-- Centrar la fila -->

        <div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7 text-center"> <!-- Añadido text-center -->
                    <h1>Welcome to Snickers Webshop</h1>
                    <p>Register to join this amazing shop!</p>
                </div>
            </div>
        </div>

            <div class="col-md-4">
                <form>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="InputFirstName" aria-describedby="FirstName">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="InputLastName" aria-describedby="LastName">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
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


    </main>
    <?php include 'footer.php'; ?>

</body>

</html>