<?php
session_start();
include "conexion.inc.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $ci = $_POST["ci"];
    $nombre = $_POST["nombre"];
    $paterno = $_POST["paterno"];

    // Escapar los valores para evitar inyecciones SQL
    $ci = mysqli_real_escape_string($conn, $ci);
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $paterno = mysqli_real_escape_string($conn, $paterno);

    // Crear la consulta de actualización
    $sql = "UPDATE persona SET nombre = '$nombre', paterno = '$paterno' WHERE ci = '$ci'";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php"); // Cambia esto a la página que desees
        exit;
    } else {
        echo "Error: " . mysqli_error($conn); // Mostrar el error
    }
}
mysqli_close($conn);
?>
