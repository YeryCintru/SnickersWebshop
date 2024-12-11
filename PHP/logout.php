<?php
session_start();


//It is left to remove user from ConnectedUsers


session_unset(); // Eliminar variables de sesión
session_destroy(); // Destruir la sesión
header('Location: index.php'); // Redirigir al login
exit();
?>