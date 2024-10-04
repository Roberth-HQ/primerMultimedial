<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'user') {
    header('Location: login.php');
    exit;
}
echo "Bienvenido, " . $_SESSION['username'];
?>
