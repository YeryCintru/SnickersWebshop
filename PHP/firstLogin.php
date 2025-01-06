<?php
session_start();
require 'database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
// Obtener el usuario de la base de datos
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM users WHERE username = :id');
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si es el primer inicio de sesión
if ($user['first_login'] != 1) {
  // header('Location: homePage.php'); // Si no es el primer login, redirigir al home
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
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Actualizar la contraseña en la base de datos
            $stmt = $pdo->prepare("UPDATE users SET password = ?, first_login = 0 WHERE id = ?");
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

<!-- Formulario HTML para el cambio de contraseña -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Cambiar Contraseña</h2>

        <!-- Mostrar mensajes de error o éxito -->
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error_message'] ?>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success_message'] ?>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <!-- Formulario de cambio de contraseña -->
        <form id="changePasswordForm" method="POST">
            <label for="newPassword">Nueva Contraseña:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="confirmPassword">Confirmar Contraseña:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit">Cambiar Contraseña</button>
        </form>
    </div>

    <!-- Incluir el archivo de JavaScript para la validación -->
    <script src="../JS/changePasswordValidation.js"></script>
</body>
</html>
