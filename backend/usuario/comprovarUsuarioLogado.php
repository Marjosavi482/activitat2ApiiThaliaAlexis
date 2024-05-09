<?php
session_start();

if (!isset($_SESSION['token'])) {
    header("Location: error.php?error=Usuario no logado");
    exit();
}
?>