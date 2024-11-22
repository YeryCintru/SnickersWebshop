<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snickers Login</title>
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
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                        </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>


            <?php
            require 'database.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);

                // Verificar si la contraseña cumple con los requisitos
                if (strlen($password) < 9) {
                    echo "La contraseña debe tener al menos 9 caracteres.<br>";
                } elseif (!preg_match('/[A-Z]/', $password)) {
                    echo "La contraseña debe contener al menos una letra mayúscula.<br>";
                } elseif (!preg_match('/[a-z]/', $password)) {
                    echo "La contraseña debe contener al menos una letra minúscula.<br>";
                } elseif (!preg_match('/\d/', $password)) {
                    echo "La contraseña debe contener al menos un número.<br>";
                } else {
                    // Buscar el usuario en la base de datos
                    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
                    $stmt->execute(['username' => $username]);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user && password_verify($password, $user['password'])) {
                        // Si las credenciales son válidas, iniciar sesión
                        $_SESSION['user_id'] = $user['IDuser'];  // Utiliza la columna correcta para el ID
                        $_SESSION['username'] = $user['username'];
                        header('Location: homePage.php'); // Redirige a la página principal
                        exit;
                    } else {
                        echo "Usuario o contraseña incorrectos.<br>";
                    }
                }
            }
            ?>




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
    <script src="..\JS\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>

</html>