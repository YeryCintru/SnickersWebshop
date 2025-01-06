<?php
include 'dependences_php/checkFirstLogin.php';

$title = "Change Password";
include 'dependences_php/headImport.php';
?>
<main>
    <div class="container">
    <h2>Cambiar Contraseña</h2>
    
    <!-- Mensaje de bienvenida y explicación -->
    <p>Por favor, introduce una nueva contraseña para completar tu primer inicio de sesión.</p>
    
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
        <div class="form-group">
            <label for="newPassword">Nueva Contraseña:</label>
            <input type="password" id="newPassword" name="newPassword" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="confirmPassword">Confirmar Contraseña:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Cambiar Contraseaa
        </button>
    </form>
</div>
<br>
<br>
</main>
<?php  include 'dependences_php/footImport.php'; ?>

    <!-- Incluir el archivo de JavaScript para la validación -->
    <script src="../JS/validationChangePassword.js"></script>

</body>

</html>