<?php 
if ($user['first_login'] == 1) {
    // Redirigir al usuario a la página de cambio de contraseña
    header('Location: changePassword.php');
    exit;
}

// Si el formulario para cambiar la contraseña ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Validar que las contraseñas coinciden
    if ($newPassword !== $confirmPassword) {
        $_SESSION['error_message'] = "Las contraseñas no coinciden. Inténtalo de nuevo.";
    } else {
        // Validar que la nueva contraseña cumple con los requisitos mínimos
        if (
            strlen($newPassword) < 9 || // Longitud mínima
            !preg_match('/[A-Z]/', $newPassword) || // Al menos una mayúscula
            !preg_match('/[a-z]/', $newPassword) || // Al menos una minúscula
            !preg_match('/\d/', $newPassword) // Al menos un número
        ) {
            $_SESSION['error_message'] = "La nueva contraseña no cumple con los requisitos mínimos.";
        } else {
            // Hashear la nueva contraseña
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Actualizar la contraseña en la base de datos
            $stmt = $pdo->prepare("UPDATE users SET password = ?, first_login = 0 WHERE id = ?");
            $stmt->execute([$hashedPassword, $user['id']]);

            // Actualizar la sesión para reflejar que la contraseña se ha cambiado
            $_SESSION['success_message'] = "Contraseña cambiada exitosamente. ¡Bienvenido!";
            
            // Redirigir al usuario a la página de inicio
            header('Location: homePage.php');
            exit;
        }
    }
}
?>