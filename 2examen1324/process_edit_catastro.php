<?php
session_start();
include "conexion.inc.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = $_POST["id"]; // Asegúrate de incluir el campo 'id' en tu formulario
    $ci = $_POST["ci"];
    $zona = $_POST["zona"]; // Cambia a 'zona'
    $xini = $_POST["xini"]; // Agregar estos campos en el formulario
    $yini = $_POST["yini"];
    $xfin = $_POST["xfin"];
    $yfin = $_POST["yfin"];
    $superficie = $_POST["superficie"];
    $distrito = $_POST["distrito"];
    $cod = $_POST["cod"];

    // Escapar los valores para evitar inyecciones SQL
    $id = mysqli_real_escape_string($conn, $id);
    $ci = mysqli_real_escape_string($conn, $ci);
    $zona = mysqli_real_escape_string($conn, $zona);
    $xini = mysqli_real_escape_string($conn, $xini);
    $yini = mysqli_real_escape_string($conn, $yini);
    $xfin = mysqli_real_escape_string($conn, $xfin);
    $yfin = mysqli_real_escape_string($conn, $yfin);
    $superficie = mysqli_real_escape_string($conn, $superficie);
    $distrito = mysqli_real_escape_string($conn, $distrito);
    $cod = mysqli_real_escape_string($conn, $cod);

    // Crear la consulta de actualización
    $sql = "UPDATE catastro SET 
                ci='$ci',
                zona = '$zona', 
                xini = '$xini', 
                yini = '$yini', 
                xfin = '$xfin', 
                yfin = '$yfin', 
                superficie = '$superficie', 
                distrito = '$distrito', 
                cod = '$cod' 
            WHERE id = '$id'"; // Asumiendo que 'id' es la clave primaria

if (mysqli_query($conn, $sql)) {

    header("Location: catastro.php?ci=" . urlencode($ci)); 
    exit;
} else {
    echo "Error: " . mysqli_error($conn); // Mostrar el error
}
}
mysqli_close($conn);
?>
