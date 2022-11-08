<?php

require '../conexion.php';

if (!isset($_POST["id"]) || !isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["role"])) {
    header("Location: http://localhost:8080/proyecto/usersAdmin.php?error=Datos incompletos");
    return;
}


$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];

$q = "INSERT INTO users VALUES ('" . $id . "', '" . $username . "', '" . $password . "', '" . $role . "')";


try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/usersAdmin.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/usersAdmin.php?error=" . $e->getMessage());
}
