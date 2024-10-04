<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar GOV.CO</title>
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
    .card.bg-warning {
        height: 200px; /* Altura fija para todos los cuadrados */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .card.bg-warning .card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 100%;
    }

    .card.bg-warning i {
        font-size: 3rem; /* Tamaño fijo para los íconos */
        margin-bottom: 1rem;
    }

    .card.bg-warning p {
        margin-bottom: 0;
        font-size: 0.9rem; /* Tamaño de fuente uniforme */
    }

    .footer-catastro {
        background-color: #004884; /* Azul oscuro del navbar */
        color: white;
        padding-top: 2rem;
        position: relative;
        overflow: hidden;
    }

    .city-skyline {
        height: 100px;
        background-image: linear-gradient(to right, 
            #003366 0%, #003366 5%, transparent 5%, transparent 10%,
            #003366 10%, #003366 15%, transparent 15%, transparent 20%,
            #003366 20%, #003366 25%, transparent 25%, transparent 30%,
            #003366 30%, #003366 40%, transparent 40%, transparent 45%,
            #003366 45%, #003366 55%, transparent 55%, transparent 60%,
            #003366 60%, #003366 70%, transparent 70%, transparent 75%,
            #003366 75%, #003366 85%, transparent 85%, transparent 90%,
            #003366 90%, #003366 100%
        );
        background-size: 100% 100%;
        background-position: bottom;
        background-repeat: no-repeat;
    }

    .footer-bottom {
        background-color: rgba(0, 0, 0, 0.2);
        padding: 1rem 0;
    }
    </style>
</head>
<body>
<?php include("navbar.php");?>
<?php include("main.php");?>
<?php include("footer.php");?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>