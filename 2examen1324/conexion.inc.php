<?php 
$host = 'localhost'; // Ajusta esto según tu configuración
$db = 'bdroberto';
$user = 'root'; // Ajusta esto según tu configuración
$pass = '123Roes456'; // Ajusta esto según tu configuración
$conn=mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>
