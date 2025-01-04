document.getElementById('signupForm').addEventListener('submit', function (e) {
        // Prevent the form from being submitted immediately
        e.preventDefault();

        // Get values from the form
        const username = document.getElementById('email').value.trim(); // Username is the email here
        
        // Validate the username (email)
        if (username.length < 5 || !username.includes('@')) {
            alert('Email must be at least 5 characters long and include "@"');
            return;
        }

        // Optionally: More robust email validation using a regex
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(username)) {
            alert('Please enter a valid email address.');
            return;
        }

        // If validation passes, proceed to submit the form
        this.submit();
    });