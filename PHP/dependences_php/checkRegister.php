<?php
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
$file_target = '..\SQL\dependences_php.sql';

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

    // Replace values manually in the SQL string
    $insertSQL = str_replace(
        [':username', ':firstName', ':lastName', ':password'],
        [$email, $firstName, $lastName, $hashedPassword],
        $query
    );
    if (file_put_contents($file_target, $insertSQL . PHP_EOL, FILE_APPEND)) {
        echo "The INSERT statement has been successfully saved to '$file_target'. Password: '$password'";

    } else {
        echo "Error saving the INSERT statement.";
    }





    
    // Send email

    $to = "javier8javier9@gmail.com";  // Recipient's email address
    $subject = "Test HTML Email";  // Email subject

    // Email body in HTML format
    $message = "<html><body>";
    $message .= "<h1>Hello, this is a test email with HTML formatting!</h1>";
    $message .= "<p>This is a <strong>test</strong> email with <em>HTML</em> formatting.</p>";
    $message .= "<p>Best regards,<br>PHP Mailer</p>";
    $message .= "</body></html>";

    // Headers to indicate that the content is HTML
    $headers = "From: prueba@gmail.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";  // Specify that the content is HTML

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>
