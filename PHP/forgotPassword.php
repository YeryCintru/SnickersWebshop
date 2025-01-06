<?php
require 'database.php';
include 'dependences_php/generatePassword.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el correo electrónico enviado por el usuario
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validar el correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Por favor, introduce un correo electrónico válido.";
    } else {
        $newPassword = generatePassword();

        // Actualizar la contraseña y establecer `first_login` en 1 para el usuario con el correo proporcionado
        $stmt = $pdo->prepare("UPDATE users SET password = ?, first_login = 1 WHERE email = ?");
        $hashedPassword = password_hash('sha512',$newPassword); // Cifrar la nueva contraseña
        $stmt->execute([$hashedPassword, $email]);

        if ($stmt->rowCount() > 0) {
            // Enviar el correo con la nueva contraseña
            $subject = "Tu nueva contraseña";
            $message = "Tu nueva contraseña es: " . $newPassword;
            $headers = "From: no-reply@tuweb.com";

            if (mail($email, $subject, $message, $headers)) {
                $_SESSION['success_message'] = "Se ha enviado una nueva contraseña a tu correo.";
            } else {
                $_SESSION['error_message'] = "Hubo un problema al enviar el correo. Inténtalo de nuevo.";
            }
        } else {
            $_SESSION['error_message'] = "No se encontró una cuenta asociada a ese correo.";
        }
    }

    // Redirigir a la misma página para mostrar el mensaje
    header("Location: index.php");
    exit();
}
?>

<?php
session_start();
$title = "Forgot password";
include 'dependences_php/headImport.php';
?>
<main>
<div class="container">
    <h2>Recuperar Contraseña</h2>

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

    <!-- Formulario para solicitar el correo -->
    <form method="POST">
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar nueva contraseña</button>
    </form>
    <br>
    <br>
</div>
</main>
    <?php include 'dependences_php/footImport.php'; ?>
</body>

</html>