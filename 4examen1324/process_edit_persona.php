<?php
session_start();
include "conexion.inc.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST["ci"];
    $nombre = $_POST["nombre"];
    $paterno = $_POST["paterno"];

    $ci = mysqli_real_escape_string($conn, $ci);
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $paterno = mysqli_real_escape_string($conn, $paterno);

    $sql = "UPDATE persona SET nombre = '$nombre', paterno = '$paterno' WHERE ci = '$ci'";
    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php"); 
        exit;
    } else {
        echo "Error: " . mysqli_error($conn); 
    }
}
mysqli_close($conn);
?>
