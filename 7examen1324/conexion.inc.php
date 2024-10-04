<?php 
$host = 'localhost'; 
$db = 'bdroberto';
$user = 'root'; 
$pass = '123Roes456'; 
$conn=mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>
