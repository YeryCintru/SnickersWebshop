<?php
session_start();
require 'dependences_php/security.php';
require 'database.php';
// Obtener el usuario de la base de datos
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM users WHERE IDuser = :id');
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);



// Verificar si es el primer inicio de sesión
if ($user['first_login'] != 1) {
     header('Location: homePage.php'); // Si no es el primer login, redirigir al home
    exit;
}

// Manejar la actualización de la contraseña
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Validar que las contraseñas coinciden
    if ($newPassword !== $confirmPassword) {
        $_SESSION['error_message'] = "Las contraseñas no coinciden. Inténtalo de nuevo.";
    } else {
        // Validar que la nueva contraseña cumpla con los requisitos
        if (
            strlen($newPassword) < 9 || // Longitud mínima
            !preg_match('/[A-Z]/', $newPassword) || // Al menos una mayúscula
            !preg_match('/[a-z]/', $newPassword) || // Al menos una minúscula
            !preg_match('/\d/', $newPassword) // Al menos un número
        ) {
            $_SESSION['error_message'] = "La nueva contraseña no cumple con los requisitos mínimos.";
        } else {
            // Hashear la nueva contraseña
            $hashedPassword = hash('sha512', $newPassword);

            // Actualizar la contraseña en la base de datos
            $stmt = $pdo->prepare("UPDATE users SET password = ?, first_login = 0 WHERE IDuser = ?");
            $stmt->execute([$hashedPassword, $userId]);

            // Actualizar la sesión para reflejar que la contraseña se ha cambiado
            $_SESSION['success_message'] = "Contraseña cambiada exitosamente. ¡Bienvenido!";

            // Redirigir al usuario a la página de inicio
            header('Location: homePage.php');
            exit;
        }
    }
}
?>