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
                <form method="POST">
                    <div class="mb-3">
                        <label for="InputFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="InputLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="repeatPassword" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control" id="repeat_password" name="repeat_password"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>



                <?php
                function generatePassword($length = 12)
                {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+';
                    $password = '';
                    for ($i = 0; $i < $length; $i++) {
                        $password .= $characters[random_int(0, strlen($characters) - 1)];
                    }
                    return $password;
                }


                session_start();
                require 'db.php'; // Asegúrate de tener la conexión a la base de datos
                $file_target = '..\SQL\users.sql';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $firstName = trim($_POST['first_name']);
                    $lastName = trim($_POST['last_name']);
                    $email = trim($_POST['email']);
                    $password = trim($password);
                    //esto no sirve    $password = trim($_POST['password']);
                    //    $repeatPassword = trim($_POST['repeat_password']);
                

                    // Hash de la contraseña usando SHA-512
                    $hashedPassword = hash('sha512', $password);

                    // Insertar al usuario en la base de datos
                    $stmt = $pdo->prepare('
            INSERT INTO users (IDuser, username, firstName, lastName, password, IDshoppingBasket)
            VALUES (:IDuser, :username, :firstName, :lastName, :password, :IDshoppingBasket)
        ');
                    $stmt->execute([
                        'IDuser' => $userId,  // ID único para el usuario
                        'username' => $email,  // Usar email como el nombre de usuario
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'password' => $hashedPassword,
                        'IDshoppingBasket' => userId  // Asignar un valor predeterminado para el carrito de compras (puedes cambiarlo si es necesario)
                    ]);

                    if (file_put_contents($file, $insertSQL)) {
                        echo "La instrucción INSERT se ha guardado correctamente en '$file'.";
                    } else {
                        echo "Error al guardar la instrucción INSERT.";
                    }
                    echo "Usuario registrado correctamente.";


                    //enviar correo
                
                    $to = "javier8javier9@gmail.com";  // Dirección del destinatario
                    $subject = "Test HTML Email";  // Asunto del correo
                
                    // Cuerpo del correo en formato HTML
                    $message = "<html><body>";
                    $message .= "<h1>Hello, this is a test email with HTML formatting!</h1>";
                    $message .= "<p>This is a <strong>test</strong> email with <em>HTML</em> formatting.</p>";
                    $message .= "<p>Best regards,<br>PHP Mailer</p>";
                    $message .= "</body></html>";

                    // Cabeceras para indicar que el contenido es HTML
                    $headers = "From: javier8javier9@gmail.com\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";  // Especificar que el contenido es HTML
                
                    // Enviar el correo
                    if (mail($to, $subject, $message, $headers)) {
                        echo "Email sent successfully!";
                    } else {
                        echo "Failed to send email.";
                    }








                } ?>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <p>Do you have already an account? <a href="index.php">Sign up here</a></p>
                </div>

            </div>
        </div>


    </main>
    <?php include 'footer.php'; ?>
    <script src="..\JS\validation.js" defer></script>
    <script src="..\JS\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>

</html>