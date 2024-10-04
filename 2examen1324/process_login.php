<?php
session_start();
include "conexion.inc.php";
// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];


// Consultar la base de datos para verificar el usuario
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verificar la contraseña
    //if (password_verify($password, $user['password'])) {
    if($password==$user['password']){
        // Autenticación exitosa
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['rol'] = $user['rol'];

        // Redirigir según el rol
        if ($user['rol'] == 'admin') {
            header('Location: admin.php'); // Redirige al panel de administración
        } else {
            header('Location: user.php'); // Redirige al panel de usuario normal
        }
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
?>
