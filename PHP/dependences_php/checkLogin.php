<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $screenResolution = trim($_POST['screenResolution']);
    $operatingSystem = trim($_POST['operatingSystem']);
    // Check if the password meets the requirements
    if (
        strlen($password) < 9 || // Longitud mínima
        !preg_match('/[A-Z]/', $password) || // Al menos una mayúscula
        !preg_match('/[a-z]/', $password) || // Al menos una minúscula
        !preg_match('/\d/', $password) // Al menos un número
    ) {
        $_SESSION['error_message'] = "The password does not meet the minimum requirements. Ensure it has at least 9 characters, including uppercase, lowercase letters, and numbers.";
    } else {
        // Search for the user in the database
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($user && (hash('sha512', $password) == $user['password'])) {
            // If credentials are valid, start a session
            //      echo '<pre>';
            //      var_dump($_POST, $user);

            //      echo '</pre>';
            $file_target = "..\SQL\logins.sql";
            $_SESSION['user_id'] = $user['IDuser'];  // Use the correct column for the ID
            $_SESSION['username'] = $user['username'];

            $stmt = $pdo->prepare(
                "INSERT INTO logins (date, screenResolution, operatingSystem, IDuser) 
                VALUES (CURRENT_TIMESTAMP, :screenResolution, :operatingSystem, :IDuser)"
            );

            // Execute the query with the values
            $stmt->execute([
                ':screenResolution' => $screenResolution,
                ':operatingSystem' => $operatingSystem,
                ':IDuser' => $user['IDuser']
            ]);


            if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id']; // Retrieve user ID from the session

                // Prepare the SQL query to update the user's 'active' status
                $stmt = $pdo->prepare(
                    "UPDATE users 
                    SET active = ? 
                    WHERE IDuser = ?"
                );
                
                // Execute the query with '1' (active) status for the user
                $stmt->execute([1, $userId]);

                if ($stmt->rowCount() > 0) {
                    echo "User status updated to inactive successfully.";
                } else {
                    echo "Failed to update user status.";
                }
            } else {
                echo "User not logged in.";
            }


            $currentDateTime = date('Y-m-d H:i:s');

            // Define the SQL query with the current date and time obtained in PHP
            $query = 'INSERT INTO logins (\'date\', \'screenResolution\', \'operatingSystem\', IDuser) 
                        VALUES (:currentDateTime, :screenResolution, :operatingSystem, :IDuser);';

            $insertSQL = str_replace(
                [':currentDateTime', ':screenResolution', ':operatingSystem', ':IDuser'],
                [$currentDateTime, $screenResolution, $operatingSystem, $user['IDuser']],
                $query
            );

            // Save the SQL statement in the logins.sql file
            if (file_put_contents($file_target, $insertSQL . PHP_EOL, FILE_APPEND)) {
                //nothing occurs
            } else {
                $_SESSION['error_message'] = "Error saving the INSERT statement.";
            }

            header(header: 'Location: firstLogin.php'); // Redirect to the main page
            exit;
        } else {
            $_SESSION['error_message'] = "Incorrect username or password. Please try again.";
        }
    }
}
?>