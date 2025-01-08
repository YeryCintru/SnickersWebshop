<?php
require 'database.php';
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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
            try {
            $mail = new PHPMailer();
            
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';               // Set the SMTP server to send through
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'webprogammingreut@gmail.com';  // SMTP username (your Gmail email address)
            $mail->Password = 'jaes owwy dtpr ajlv';              // SMTP password
            $mail->Port = 587;                                    // TCP port to connect to
    
            //Recipients
            $mail->setFrom('webprogammingreut@gmail.com', 'Urbankicks');  // Set the sender email and name
            $mail->addAddress($email);                              // Add recipient email address
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Your new password";
            $mail->Body = "
            <p>Hello,</p>
            <p>Your new password for your UrbanKicks account is: <strong>" . $newPassword . "</strong></p>
            <p>Please use this password to log in to your account. Once you log in, we recommend that you change your password to something more personal and secure.</p>
            <p>If you did not request this change, please contact support immediately.</p>
            <p>Best regards,<br>UrbanKicks Support Team</p>
        ";

        // Plain text alternative (for non-HTML email clients)
        $mail->AltBody = "
            Hello,

            Your new password for your UrbanKicks account is: " . $newPassword . "

            Please use this password to log in to your account. Once you log in, we recommend that you change your password to something more personal and secure.

            If you did not request this change, please contact support immediately.

            Best regards,
            UrbanKicks Support Team
        ";
        
        if ($mail->send()) {
                $_SESSION['success_message'] = "A new password has been sent to your email.";
            } else {
                $_SESSION['error_message'] = "There was a problem sending the email. Please try again.";
            }

        }       catch (Exception $e) {
                $_SESSION['error_message'] = "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    }

    // Redirect to the same page to show the message
    header("Location: submittedForgotPassword.php");
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

    <div class="container d-flex justify-content-center align-items-center min-vh-50">
    <form method="POST" class="bg-white p-4 rounded shadow-sm w-50">
        <h2 class="text-center mb-4">Forgot Your Password?</h2>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
        </div>
        <button type="submit" class="btn btn-primary w-100">Send New Password</button>
    </form>
</div>

</div>
</main>
    <?php include 'dependences_php/footImport.php'; ?>
</body>

</html>
