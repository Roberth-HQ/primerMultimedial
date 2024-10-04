<?php
include "conexion.inc.php";
$ci = $_GET["ci"];
$sql = "SELECT * FROM persona WHERE ci = $ci";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($resultado);
$ci = $fila["ci"];
$nombre = $fila["nombre"];
$paterno = $fila["paterno"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container input[type="text"],
        .login-container input[type="password"] {
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
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Editar Persona</h1>
        <form action="process_edit_persona.php" method="POST">
            <div class="mb-3">
                <label for="ci" class="form-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>" required>
            </div>
            <button type="submit" class="btn btn-facebook w-100">Aceptar</button>
            <div>
                <h1></h1>
            </div>
            <button type="button" class="btn btn-danger w-100 mt-2" onclick="window.history.back();">Cancelar</button>
        </form>
    </div>

</body>
</html>