<?php
include "conexion.inc.php"; 
if (isset($_GET["id"])) {
    $ci = $_GET["ci"];
    $id = $_GET["id"];
    $sql = "DELETE FROM catastro WHERE id = ?";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $id);
        

        if (mysqli_stmt_execute($stmt)) {
            header("Location: catastro.php?ci=" . urlencode($ci));
            exit(); 
        } else {
            echo "Error al eliminar la persona: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la declaración: " . mysqli_error($conn);
    }
} else {
    echo "No se ha proporcionado el ID.";
}
mysqli_close($conn);
?>