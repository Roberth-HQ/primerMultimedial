<?php
include "conexion.inc.php"; 
if (isset($_GET["ci"])) {
    $ci = $_GET["ci"];

    $sql = "DELETE FROM persona WHERE ci = ?";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $ci);
        
        // Ejecuta la declaración
        if (mysqli_stmt_execute($stmt)) {
            header("Location: admin.php");
            exit(); 
        } else {
            echo "Error al eliminar la persona: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la declaración: " . mysqli_error($conn);
    }
} else {
    echo "No se ha proporcionado el CI.";
}
mysqli_close($conn);







// if (isset($_GET["ci"])) {
//     $ci = $_GET["ci"];

//     // Primero, elimina los registros de catastro
//     $sqlCatastro = "DELETE FROM catastro WHERE ci = ?";
    
//     if ($stmtCatastro = mysqli_prepare($conn, $sqlCatastro)) {
//         mysqli_stmt_bind_param($stmtCatastro, "s", $ci);
        
//         // Ejecuta la declaración para eliminar de catastro
//         if (!mysqli_stmt_execute($stmtCatastro)) {
//             echo "Error al eliminar de catastro: " . mysqli_error($conn);
//         }
//         mysqli_stmt_close($stmtCatastro);
//     } else {
//         echo "Error en la preparación de la declaración de catastro: " . mysqli_error($conn);
//     }

//     // Ahora, elimina la persona
//     $sqlPersona = "DELETE FROM persona WHERE ci = ?";
    
//     if ($stmtPersona = mysqli_prepare($conn, $sqlPersona)) {
//         mysqli_stmt_bind_param($stmtPersona, "s", $ci);
        
//         // Ejecuta la declaración para eliminar de persona
//         if (mysqli_stmt_execute($stmtPersona)) {
//             header("Location: admin.php");
//             exit(); 
//         } else {
//             echo "Error al eliminar la persona: " . mysqli_error($conn);
//         }
//         mysqli_stmt_close($stmtPersona);
//     } else {
//         echo "Error en la preparación de la declaración de persona: " . mysqli_error($conn);
//     }
// } else {
//     echo "No se ha proporcionado el CI.";
// }

// mysqli_close($conn);














?>