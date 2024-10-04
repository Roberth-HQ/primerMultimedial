<?php
session_start(); // Iniciar la sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

header('Location: login.php'); // Redirige al usuario a la página de inicio de sesión
exit; // Asegúrate de que no se ejecute más código
?>