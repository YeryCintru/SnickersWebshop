<?php
require 'database.php';
include 'dependences_php/generatePassword.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email sent by the user
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Please enter a valid email address.";
    } else {
        $newPassword = generatePassword();

        // Update the password and set `first_login` to 1 for the user with the provided email
        $stmt = $pdo->prepare("UPDATE users SET password = ?, first_login = 1 WHERE username = ?");
        $hashedPassword = hash('sha512', $newPassword); // Encrypt the new password
        $stmt->execute([$hashedPassword, $email]);

        if ($stmt->rowCount() > 0) {
            // Send the email with the new password
            $subject = "Your new password";
            $message = "Your new password is: " . $newPassword;
            $headers = "From: no-reply@yourwebsite.com";

            if (mail($email, $subject, $message, $headers)) {
                $_SESSION['success_message'] = "A new password has been sent to your email.";
            } else {
                $_SESSION['error_message'] = "There was a problem sending the email. Please try again.";
            }
        } else {
            $_SESSION['error_message'] = "No account found associated with that email.";
        }
    }

    // Redirect to the same page to show the message
    header("Location: index.php");
    exit();
}
?>

<?php
session_start();
$title = "Forgot Password";
include 'dependences_php/headImport.php';
?>
<main>
<div class="container">
    <h2>Recover Password</h2>

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

    <!-- Form to request the email -->
    <form method="POST">
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Send New Password</button>
    </form>
    <br>
    <br>
</div>
</main>
    <?php include 'dependences_php/footImport.php'; ?>
</body>

</html>
