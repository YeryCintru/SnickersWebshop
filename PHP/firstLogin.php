<?php
include 'dependences_php/checkFirstLogin.php';

$title = "Change Password";
include 'dependences_php/headImport.php';
?>
<main>
    <div class="container">
    <h2>Change Password</h2>
    
    <!-- Welcome message and explanation -->
    <p>Please enter a new password to complete your first login.</p>
    
    <!-- Display error or success messages -->
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

    <!-- Password change form -->
    <form id="changePasswordForm" method="POST">
        <div class="form-group">
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Change Password
        </button>
    </form>
</div>
<br>
<br>
</main>
<?php  include 'dependences_php/footImport.php'; ?>

    <!-- Include the JavaScript file for validation -->
    <script src="../JS/validationChangePassword.js"></script>

</body>

</html>
