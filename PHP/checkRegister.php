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
                require 'database.php'; // Asegúrate de tener la conexión a la base de datos
                $file_target = '..\SQL\users.sql';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $firstName = trim($_POST['first_name']);
                    $lastName = trim($_POST['last_name']);
                    $email = trim($_POST['email']);
                    $password = trim(generatePassword());
                    //esto no sirve    $password = trim($_POST['password']);
                    //    $repeatPassword = trim($_POST['repeat_password']);
                

                    // Hash de la contraseña usando SHA-512
                    $hashedPassword = hash('sha512', $password);

                    // Insertar al usuario en la base de datos
                    $stmt = $pdo->prepare('
            INSERT INTO users (username, firstName, lastName, password) VALUES (:username, :firstName, :lastName, :password) ');
                    $stmt->execute([
                        'username' => $email,  // Usar email como el nombre de usuario
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'password' => $hashedPassword,
                    ]);


                    $query = 'INSERT INTO users (username, firstName, lastName, password) 
                    VALUES (:username, :firstName, :lastName, :password)';

                    // Reemplaza los valores manualmente en la cadena SQL
                    $insertSQL = str_replace(
                        [':username', ':firstName', ':lastName', ':password'],
                        [$email, $firstName, $lastName, $hashedPassword],
                        $query
                    );
                    if (file_put_contents($file_target, $insertSQL . PHP_EOL, FILE_APPEND)) {
                        echo "La instrucción INSERT se ha guardado correctamente en '$file_target'.";
                    } else {
                        echo "Error al guardar la instrucción INSERT.";
                    }

                    //enviar correo
                
                    $to = "prueba@gmail.com";  // Dirección del destinatario
                    $subject = "Test HTML Email";  // Asunto del correo
                
                    // Cuerpo del correo en formato HTML
                    $message = "<html><body>";
                    $message .= "<h1>Hello, this is a test email with HTML formatting!</h1>";
                    $message .= "<p>This is a <strong>test</strong> email with <em>HTML</em> formatting.</p>";
                    $message .= "<p>Best regards,<br>PHP Mailer</p>";
                    $message .= "</body></html>";

                    // Cabeceras para indicar que el contenido es HTML
                    $headers = "From: prueba@gmail.com\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";  // Especificar que el contenido es HTML
                
                    // Enviar el correo
                    if (mail($to, $subject, $message, $headers)) {
                        echo "Email sent successfully!";
                    } else {
                        echo "Failed to send email.";
                    }
                }
                    ?>