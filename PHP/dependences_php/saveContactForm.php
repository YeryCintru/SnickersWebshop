<?php
require 'database.php'; // Asegúrate de incluir tu archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    // Validación de los campos
    if (empty($email) || empty($name) || empty($message)) {
        echo "All fields are required.<br>";
    } else {
        // Asegúrate de que la tabla 'supportTickets' exista en tu base de datos
        $stmt = $pdo->prepare('INSERT INTO supportTickets (Name, Description, IDuser) 
                               VALUES (:name, :message, :user_id)');

        // Asumimos que la sesión de usuario ya está iniciada y que el ID de usuario está disponible
        $user_id = $_SESSION['user_id']; // Debes tener un sistema de autenticación de usuarios

        $stmt->execute([
            ':name' => $name,
            ':message' => $message,
            ':user_id' => $user_id
        ]);

        echo "Your message has been submitted successfully.<br>";
        header('Location: thankYouPage.php'); // Redirige a una página de agradecimiento
        exit;
    }
}
?>