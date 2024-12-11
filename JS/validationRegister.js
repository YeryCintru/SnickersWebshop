document.getElementById('signupForm').addEventListener('submit', function (e) {
    // Prevent the form from being submitted immediately
    e.preventDefault();

    // Get values from the form
    const username = document.getElementById('email').value.trim(); // Username is the email here
    const password = document.getElementById('password').value.trim();
    const repeatPassword = document.getElementById('repeat_password').value.trim();

    // Step 1: Validate the username (email)
    if (username.length < 5 || !username.includes('@')) {
        alert('Username must be at least 5 characters long and include "@"');
        return;
    }

    // Step 3: Proceed to submit the form
    this.submit();
});


