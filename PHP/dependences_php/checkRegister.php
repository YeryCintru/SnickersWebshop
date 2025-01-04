<?php
//require '../../vendor/autoload.php';
//use phpMailer\PHPMailer\PHPMailer;
//use phpMailer\PHPMailer\Exception;

function generatePassword($length = 12)
{
    // Define character sets to meet the requirements
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $specials = '!@#$%^&*()-_=+';

    // Combine all subsets for the rest of the password
    $allCharacters = $uppercase . $lowercase . $numbers . $specials;

    // Ensure that the password meets the basic requirements
    $password = '';
    $password .= $uppercase[random_int(0, strlen($uppercase) - 1)]; // At least one uppercase letter
    $password .= $lowercase[random_int(0, strlen($lowercase) - 1)]; // At least one lowercase letter
    $password .= $numbers[random_int(0, strlen($numbers) - 1)];     // At least one number
    $password .= $specials[random_int(0, strlen($specials) - 1)];   // At least one special character

    // Complete the remaining length with random characters
    for ($i = strlen($password); $i < $length; $i++) {
        $password .= $allCharacters[random_int(0, strlen($allCharacters) - 1)];
    }

    // Shuffle the characters to avoid a predictable pattern
    $password = str_shuffle($password);

    return $password;
}

require 'database.php'; // Make sure to have the database connection
$file_target = '..\SQL\users.sql';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim(string: generatePassword());
    // This does not work    $password = trim($_POST['password']);
    //    $repeatPassword = trim($_POST['repeat_password']);


    // Hash the password using SHA-512
    $hashedPassword = hash('sha512', $password);

    // Insert the user into the database
    $stmt = $pdo->prepare('
            INSERT INTO users (username, firstName, lastName, password) VALUES (:username, :firstName, :lastName, :password) ');
    $stmt->execute([
        'username' => $email,  // Use email as the username
        'firstName' => $firstName,
        'lastName' => $lastName,
        'password' => $hashedPassword,
    ]);


    $query = 'INSERT INTO users (username, firstName, lastName, password) 
                    VALUES (:username, :firstName, :lastName, :password)
                    ';

    // Replace values manually in the SQL string and add quotes around values
    $insertSQL = str_replace(
        [':username', ':firstName', ':lastName', ':password'],
        ["'{$email}'", "'{$firstName}'", "'{$lastName}'", "'{$hashedPassword}'"],
        $query
    );
    if (file_put_contents($file_target, $insertSQL . PHP_EOL, FILE_APPEND)) {
        echo "The INSERT statement has been successfully saved to '$file_target'. Password: '$password'";

    } else {
        echo "Error saving the INSERT statement.";
    }
/*
    $mail = new PHPMailer(true);  // Instanciar PHPMailer

    try {
        //Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'usuario@example.com';
        $mail->Password = 'password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        //Destinatarios
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('recipient@example.com', 'Joe User');
    
        //Contenido
        $mail->isHTML(true);
        $mail->Subject = 'Test Email';
        $mail->Body    = 'This is a <b>test</b> email message.';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
*/
}
?>
