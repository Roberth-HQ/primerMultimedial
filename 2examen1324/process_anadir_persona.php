<?php
include "conexion.inc.php"; // Incluye el archivo de conexión a la base de datos

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $ci = $_POST["ci"];
    $nombre = $_POST["nombre"];
    $paterno = $_POST["paterno"];

    // Prepara la consulta SQL para insertar la nueva persona
    $sql = "INSERT INTO persona (ci, nombre, paterno) VALUES (?, ?, ?)";
    
    // Prepara la declaración
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Vincula los parámetros (s para string)
        mysqli_stmt_bind_param($stmt, "sss", $ci, $nombre, $paterno);
        
        // Ejecuta la declaración
        if (mysqli_stmt_execute($stmt)) {
            // Si la inserción fue exitosa, redirige a admin.php
            header("Location: admin.php");
            exit(); // Asegúrate de llamar a exit después de header
        } else {
            $error_message = "Error al añadir la persona: " . mysqli_error($conn);
        }

        // Cierra la declaración
        mysqli_stmt_close($stmt);
    } else {
        $error_message = "Error en la preparación de la declaración: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Persona</title>
    <style>
        body {
            background-color: #1877F2; /* Color azul de fondo */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h1 {
            font-size: 24px;
            color: #1877F2;
            margin-bottom: 20px;
        }

        .login-container input[type="text"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container button {
            width: 100%;
            padding: 15px;
            background-color: #1877F2;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #165db7;
        }

        .login-container a {
            display: block;
            color: #1877F2;
            margin-top: 15px;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Añadir Persona</h1>
        <?php if (isset($error_message)) : ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="process_anadir_persona.php" method="POST">
            <div class="mb-3">
                <label for="ci" class="form-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>
            <button type="submit" class="btn btn-facebook w-100">Añadir</button>
            <button type="button" class="btn btn-danger w-100 mt-2" onclick="window.history.back();">Cancelar</button>
        </form>
    </div>

</body>
</html>

<?php
mysqli_close($conn);
?>