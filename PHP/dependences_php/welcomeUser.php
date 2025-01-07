<?php 
require 'database.php';


try{
    $userId= $_SESSION['user_id']; 
$stmt = $pdo->prepare("SELECT firstName, lastName, last_login, active FROM users WHERE IDuser = ?");
    $stmt->execute([$userId]);

    // Obtener los resultados
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Extraer datos del usuario
        $firstName = $user['firstName'];
        $lastName = $user['lastName'];
        $lastLogin = $user['last_login'];
        $isActive = $user['active'];

        // Verificar si el usuario está activo
        if (!$isActive) {
            echo "Your account is inactive. Please contact support.";
            exit;
        }

        // Formatear fecha de último inicio de sesión
        $dateTime = new DateTime($lastLogin);
        $dayOfWeek = $dateTime->format('l'); // Día de la semana
        $formattedDate = $dateTime->format('d.m.Y'); // Fecha en formato DD.MM.YYYY

        $message = "Welcome Mr/Mrs $lastName. You were last online on $dayOfWeek - $formattedDate.";
    
} else {
    $errorMessage = "User not found.";
}
} catch (PDOException $e) {
// Manejo de errores
$errorMessage = "Database error: " . $e->getMessage();
}
?>