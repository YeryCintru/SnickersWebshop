<?php 

require 'database.php';
//var_dump($_POST)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Verificar si la contraseña cumple con los requisitos
    if (strlen($password) < 9) {
        echo "La contraseña debe tener al menos 9 caracteres.<br>";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        echo "La contraseña debe contener al menos una letra mayúscula.<br>";
    } elseif (!preg_match('/[a-z]/', $password)) {
        echo "La contraseña debe contener al menos una letra minúscula.<br>";
    } elseif (!preg_match('/\d/', $password)) {
        echo "La contraseña debe contener al menos un número.<br>";
    } else {
        // Buscar el usuario en la base de datos
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Si las credenciales son válidas, iniciar sesión
            $_SESSION['user_id'] = $user['IDuser'];  // Utiliza la columna correcta para el ID
            $_SESSION['username'] = $user['username'];
            header('Location: homePage.php'); // Redirige a la página principal
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.<br>";
        }
    }
}


?>