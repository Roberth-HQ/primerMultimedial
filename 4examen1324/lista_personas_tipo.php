<?php
include "conexion.inc.php";
$sql = "SELECT 
            SUM(CASE WHEN LEFT(cod, 1) = '1' THEN 1 ELSE 0 END) AS codigo_1,
            SUM(CASE WHEN LEFT(cod, 1) = '2' THEN 1 ELSE 0 END) AS codigo_2,
            SUM(CASE WHEN LEFT(cod, 1) = '3' THEN 1 ELSE 0 END) AS codigo_3
        FROM 
            catastro";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-top {
            background-color: #3366CC;
        }
        .navbar-main {
            background-color: #004884;
        }
        .navbar-brand img {
            height: 40px;
        }
        .nav-link {
            color: white !important;
        }
        .btn-outline-light {
            border-color: white;
        }
        .navbar-bottom {
            background-color: #f8f9fa;
        }
        .navbar-bottom .nav-link {
            color: #333 !important;
            font-weight: bold;
        }

    .custom-table {
        width: 80%; /* Ajusta el ancho según sea necesario */
        margin: 0 auto; /* Centrar la tabla */
    }

    .custom-table tbody tr:nth-child(odd) {
        background-color: #004884; /*004884 Azul más oscuro para las filas impares */
        color: white;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #0056b3; /* 0056b3Azul claro para las filas pares */
        color: white;
    }
    .custom-table thead th {
        background-color: #004080; /* Fondo azul oscuro */
        color: white; /* Texto blanco */
    }
    .custom-table th, .custom-table td {
        color: white !important; /* Fuerza el color blanco */
        border-color: white; /* Bordes blancos */
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-top py-1">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://cdn.pixabay.com/photo/2015/03/10/17/23/youtube-667451_1280.png" alt="GOV.CO logo" class="img-fluid">
            </a>
            <div class="justify-content-between">
            <h2>HAM-LP</h2>
            </div>
            <div class="d-flex">
                <a href="#" class="nav-link me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="nav-link me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="nav-link"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-main py-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> lista de personas por tipo de impuesto </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-bottom py-0">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav2">
                <ul class="navbar-nav w-100 justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link btn btn-light" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light" href="#">Trámites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light" href="#">Preguntas CEL</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn btn-light" href="lista_personas_tipo.php">obtener la lista de personas por tipo de impuesto</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn btn-light" href="hola_mundo.php">Hola Mundo en PHP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- tabla -->
<div class="custom-container">
    <table class="table table-striped custom-table custom-table">
        <thead>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {

            echo "<tr><th>Código 1</th><th>Código 2</th><th>Código 3</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['codigo_1'] . "</td>";
                echo "<td>" . $row['codigo_2'] . "</td>";
                echo "<td>" . $row['codigo_3'] . "</td>";
                echo "</tr>";
            }

        } else {
            echo "0 resultados";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>