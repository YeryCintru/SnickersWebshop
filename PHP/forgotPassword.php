<?php
session_start();
$title = "Forgot Password";
include 'dependences/headImport.php';
?>
<main>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            
            <h2>Forgot Password</h2>
            <form action="forgotPassword.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</main>
<?php include 'dependences/footImport.php'; ?>
</body>
</html>