<?php
    $servername="localhost";
    $database="fct";
    $username="david";
    $password="qwe123QWE123*";

    //crear conexion
    $conn=mysqli_connect($servername,$username,$password,$database);
    mysqli_set_charset($conn,"utf8");

    //comprobar conexion
    if(!$conn){
        die("Conexion fallida: ".mysqli_connect_error());
    };

?>