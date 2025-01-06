document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
    // Prevent the form from being submitted immediately
    e.preventDefault();

    // Get values from the form
    const newPassword = document.getElementById('newPassword').value.trim(); // New password
    const confirmPassword = document.getElementById('confirmPassword').value.trim(); // Confirm password

    // Validate that the passwords match
    if (newPassword !== confirmPassword) {
        alert('The passwords do not match. Please try again.');
        return;
    }

    // Validate that the new password meets the requirements (at least 9 characters, uppercase, lowercase, and numbers)
    if (newPassword.length < 9 || !/[A-Z]/.test(newPassword) || !/[a-z]/.test(newPassword) || !/\d/.test(newPassword)) {
        alert('The password must be at least 9 characters long and contain uppercase letters, lowercase letters, and numbers.');
        return;
    }

    // If everything is valid, submit the form
    this.submit();
});
