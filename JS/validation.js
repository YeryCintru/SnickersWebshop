document.getElementById('signupForm').addEventListener('submit', function (e) {
    // Prevent the form from being submitted immediately
    e.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    // Step 1: Validate the username
    if (username.length < 5 || !username.includes('@')) {
        alert('Username must be at least 5 characters long and include "@"');
        return;
    }

    // Step 2: Validate the password
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{9,}$/; // At least 9 chars, one uppercase, one lowercase, one number
    if (!passwordRegex.test(password)) {
        alert('Password must be at least 9 characters long and contain one uppercase letter, one lowercase letter, and one number');
        return;
    }

    // Step 3: Hash the password before sending to the server
    const hashedPassword = CryptoJS.SHA512(password).toString(CryptoJS.enc.Base64); // Hash password using SHA-512

    // Step 4: Add the hashed password to the form data
    const passwordField = document.getElementById('password');
    passwordField.value = hashedPassword; // Replace the password field value with the hashed value

    // Step 5: Submit the form after validation
    this.submit();
});
