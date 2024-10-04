<?php
$ci = isset($_GET['ci']) ? $_GET['ci'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Distrito</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Selecciona un Distrito</h1>
    <div class="btn-group" role="group">
        <button class="btn btn-primary" onclick="redirectToProcess(1, '<?php echo $ci; ?>')">Distrito 1</button>
        <button class="btn btn-primary" onclick="redirectToProcess(2, '<?php echo $ci; ?>')">Distrito 2</button>
        <button class="btn btn-primary" onclick="redirectToProcess(3, '<?php echo $ci; ?>')">Distrito 3</button>
        <button class="btn btn-primary" onclick="redirectToProcess(4, '<?php echo $ci; ?>')">Distrito 4</button>
    </div>

    <script>
        function redirectToProcess(distrito, ci) {
            window.location.href = 'process_ajax.php?distrito=' + encodeURIComponent(distrito) + '&ci=' + encodeURIComponent(ci);
        }
    </script>
</body>
</html>
        