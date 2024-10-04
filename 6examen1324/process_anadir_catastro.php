<?php
include "conexion.inc.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $zona = $_POST["zona"];
    $xini = $_POST["xini"];
    $yini = $_POST["yini"];
    $xfin = $_POST["xfin"];
    $yfin = $_POST["yfin"];
    $superficie = $_POST["superficie"];
    $ci = $_POST["ci"]; 
    $distrito = $_POST["distrito"];
    $cod = $_POST["cod"];


    $sql = "INSERT INTO catastro (zona, xini, yini, xfin, yfin, superficie, ci, distrito, cod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssssss", $zona, $xini, $yini, $xfin, $yfin, $superficie, $ci, $distrito, $cod);
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: catastro.php?ci=" . urlencode($ci));
            exit();
        } else {
            $error_message = "Error al añadir el registro de catastro: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        $error_message = "Error en la preparación de la declaración: " . mysqli_error($conn);
    }
}

$ci = isset($_GET['ci']) ? $_GET['ci'] : ''; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Registro de Catastro</title>
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

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px; /* Aumentar el ancho para las dos columnas */
            text-align: left; /* Alineación a la izquierda */
        }

        .form-container h1 {
            font-size: 24px;
            color: #1877F2;
            margin-bottom: 20px;
            text-align: center; /* Centrar el título */
        }

        .form-row {
            display: flex; /* Hacer que los campos estén en una fila */
            flex-wrap: wrap; /* Permitir que los elementos se envuelvan en la siguiente fila si es necesario */
            margin-bottom: 15px;
        }

        .form-column {
            flex: 1; /* Las columnas ocupan igual espacio */
            min-width: 300px; /* Ancho mínimo para las columnas */
            padding: 0 10px; /* Espacio entre columnas */
        }

        .form-container input[type="text"], 
        .form-container input[type="number"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            width: 100%;
            padding: 15px;
            background-color: #1877F2;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #165db7;
        }

        .form-container .error {
            color: red;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Añadir Registro de Catastro</h1>
        <?php if (isset($error_message)) : ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="process_anadir_catastro.php" method="POST">
            <div class="form-row">
                <div class="form-column">
                    <label for="zona" class="form-label">Zona</label>
                    <input type="text" id="zona" name="zona" required>
                </div>
                <div class="form-column">
                    <label for="ci" class="form-label">CI</label>
                    <input type="text" id="ci" name="ci" value="<?php echo htmlspecialchars($ci); ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="xini" class="form-label">X Inicial</label>
                    <input type="text" id="xini" name="xini" required>
                </div>
                <div class="form-column">
                    <label for="distrito" class="form-label">Distrito</label>
                    <input type="text" id="distrito" name="distrito" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="yini" class="form-label">Y Inicial</label>
                    <input type="text" id="yini" name="yini" required>
                </div>
                <div class="form-column">
                    <label for="cod" class="form-label">Código</label>
                    <input type="text" id="cod" name="cod" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="xfin" class="form-label">X Final</label>
                    <input type="text" id="xfin" name="xfin" required>
                </div>
                <div class="form-column">
                    <label for="superficie" class="form-label">Superficie</label>
                    <input type="number" id="superficie" name="superficie" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-column">
                    <label for="yfin" class="form-label">Y Final</label>
                    <input type="text" id="yfin" name="yfin" required>
                </div>
            </div>
            <button type="submit">Añadir</button>
            <button type="button" onclick="window.history.back();">Cancelar</button>
        </form>
    </div>

</body>
</html>

<?php
mysqli_close($conn);
?>
