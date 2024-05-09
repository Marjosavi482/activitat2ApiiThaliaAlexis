<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelPorc</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="../styles/style.css">

</head>
<body>
    <header>
        <div>
             <h1><a href="index.php">Find Career Task</a></h1>
             <div>
             <?php
             session_start();
             $loged = isset($_SESSION['usuari']);
             if ($loged) {
                 echo "<a href='../backend/logout.proc.php'>Bienvenido/a, " . $_SESSION['usuari'] . "</a>";
             } else {
                 echo "<a href='../frontend/usuario/login.html'>Iniciar sesión</a>";
             }
             ?>
             </div>
        </div>
       
        <nav>
            <ul>
                <li><a href="empresa/verEmpresas.html">Empresas</a></li>
                <li><a href="valoracion/verValoraciones.html">Valoraciones</a></li>                
            </ul>
        </nav>
    </header>
    <div id="container-general">