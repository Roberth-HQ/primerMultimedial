<?php
include "conexion.inc.php";
$id = $_GET["id"];
$sql = "SELECT * FROM catastro WHERE id = $id";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($resultado);
$ci = $fila["ci"];
$zona = $fila["zona"];
$xini = $fila["xini"];
$yini = $fila["yini"];
$xfin = $fila["xfin"];
$yfin = $fila["yfin"];
$superficie = $fila["superficie"];
$distrito = $fila["distrito"];
$cod = $fila["cod"];
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
        overflow: hidden; /* Evitar el desplazamiento en la vista */
    }

    .login-container {
        background-color: white;
        padding: 20px; /* Reducir el padding */
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
        overflow: auto; /* Permitir desplazamiento si es necesario */
        max-height: 90vh; /* Limitar la altura del contenedor */
    }

    .login-container h1 {
        font-size: 24px;
        color: #1877F2;
        margin-bottom: 20px;
    }

    .login-container input[type="text"],
    .login-container input[type="password"],
    .login-container input[type="number"] { /* Estilo para inputs de tipo number */
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
        <h1>Editar Catastro</h1>
        <form action="process_edit_catastro.php" method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="ci" class="form-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" required>
            </div>
            <div class="mb-3">
                <label for="zona" class="form-label">Zona</label>
                <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $zona; ?>" required>
            </div>
            <div class="mb-3">
                <label for="xini" class="form-label">X Inicial</label>
                <input type="number" class="form-control" id="xini" name="xini" value="<?php echo $xini; ?>" required>
            </div>
            <div class="mb-3">
                <label for="yini" class="form-label">Y Inicial</label>
                <input type="number" class="form-control" id="yini" name="yini" value="<?php echo $yini; ?>" required>
            </div>
            <div class="mb-3">
                <label for="xfin" class="form-label">X Final</label>
                <input type="number" class="form-control" id="xfin" name="xfin" value="<?php echo $xfin; ?>" required>
            </div>
            <div class="mb-3">
                <label for="yfin" class="form-label">Y Final</label>
                <input type="number" class="form-control" id="yfin" name="yfin" value="<?php echo $yfin; ?>" required>
            </div>
            <div class="mb-3">
                <label for="superficie" class="form-label">Superficie</label>
                <input type="number" class="form-control" id="superficie" name="superficie" value="<?php echo $superficie; ?>" required>
            </div>
            <div class="mb-3">
                <label for="distrito" class="form-label">Distrito</label>
                <input type="number" class="form-control" id="distrito" name="distrito" value="<?php echo $distrito; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cod" class="form-label">Código</label>
                <input type="number" class="form-control" id="cod" name="cod" value="<?php echo $cod; ?>" required>
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