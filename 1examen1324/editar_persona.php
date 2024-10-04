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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-61JIFH4Ygh7oO98iMCq3D2s3H+6fJ2jB5qD7LsKmSHVHRVRz+8Xq1Unyxw5yw3oc" crossorigin="anonymous">
    <style>
        body {
            background-color: #3b5998; /* Color de fondo azul Facebook */
        }
        .form-container {
            max-width: 500px; /* Ancho máximo del formulario */
            margin: 50px auto; /* Centrado vertical y horizontal */
            padding: 20px; /* Espaciado interno */
            background-color: white; /* Color de fondo blanco */
            border-radius: 5px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para el formulario */
        }
        h1 {
            color: #3b5998; /* Color del título */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="text-center">Editar Persona</h1>
        <form>
            <div class="mb-3">
                <label for="ci" class="form-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Aceptar</button>
                <button type="button" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>