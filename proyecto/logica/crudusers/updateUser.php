<?php

require '../conexion.php';

if (!isset($_POST["id"]) || !isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["role"])) {
    header("Location: http://localhost:8080/proyecto/usersAdmin.php?error=Datos incompletos");
}


$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];

$q = "UPDATE users SET username='" . $username . "', password = '" . $password . "', role = '" . $role . "' WHERE id =" . $id;

try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/usersAdmin.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/usersAdmin.php?error=" . $e->getMessage());
}
