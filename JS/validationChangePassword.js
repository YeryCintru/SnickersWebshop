document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
    // Prevent the form from being submitted immediately
    e.preventDefault();

    // Get values from the form
    const newPassword = document.getElementById('newPassword').value.trim(); // Nueva contraseña
    const confirmPassword = document.getElementById('confirmPassword').value.trim(); // Confirmar contraseña

    // Validar que las contraseñas coinciden
    if (newPassword !== confirmPassword) {
        alert('Las contraseñas no coinciden. Por favor, inténtalo de nuevo.');
        return;
    }

    // Validar que la nueva contraseña cumpla con los requisitos (mínimo 9 caracteres, mayúsculas, minúsculas y números)
    if (newPassword.length < 9 || !/[A-Z]/.test(newPassword) || !/[a-z]/.test(newPassword) || !/\d/.test(newPassword)) {
        alert('La contraseña debe tener al menos 9 caracteres y contener letras mayúsculas, minúsculas y números.');
        return;
    }

    // Si todo es válido, enviar el formulario
    this.submit();
});