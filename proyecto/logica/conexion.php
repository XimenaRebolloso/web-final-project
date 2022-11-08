<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "proyect";

    $conexion = mysqli_connect($host, $user, $pass, $bd);

    if($conexion)
    {
        echo "Conexion exitosa";
    }else{
        echo "Error";
    }
?>
