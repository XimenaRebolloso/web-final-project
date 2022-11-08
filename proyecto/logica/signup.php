<?php

require 'conexion.php';

if (!isset($_POST["id"]) || !isset($_POST["username"]) || !isset($_POST["password"])) {
    header("Location: http://localhost:8080/proyecto/signup.php?error=Datos incompletos");
    return;
}


$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$role = "CLIENT";

$q = "INSERT INTO users VALUES ('" . $id . "', '" . $username . "', '" . $password . "', '" . $role . "')";


try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/login.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/signup.php?error=" . $e->getMessage());
}