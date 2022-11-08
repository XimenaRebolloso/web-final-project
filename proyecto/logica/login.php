<?php
    require 'conexion.php';

    if (!isset($_POST["user"]) || !isset($_POST["pass"])) {
        header("Location: http://localhost:8080/proyecto/login.php");
    }
    
    session_start();
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $role = $_POST["role"];
    //$_SESSION["user"] = $user;
    
    $q = "SELECT COUNT(*) as login, role FROM users WHERE username='".$user."' AND password='".$pass."'";

    $query = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($query);

    if($array['login'] > 0){
        //Login exitoso
        //echo "Login exitoso";
        $_SESSION['username'] = $user;
        $_SESSION['role'] = $array['role'];
        header("Location: http://localhost:8080/proyecto/homeAdmin.php");
    }
    else{
        //Login Incorrecto
        //echo "Login incorrecto";
        header("Location: http://localhost:8080/proyecto/login.php?error=Datos Incorrectos");
    }

    //echo $q;
