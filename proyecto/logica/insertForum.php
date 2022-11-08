<?php

require 'conexion.php';

if (!isset($_POST["username"]) || !isset($_POST["subject"]) || !isset($_POST["content"])) {
    header("Location: http://localhost:8080/proyecto/comentarios.php?error=Datos incompletos");
    return;
}


$username = $_POST["username"];
$subject = $_POST["subject"];
$content = $_POST["content"];

$q = "INSERT INTO forum VALUES ('" . $username . "', '" . $subject . "', '" . $content . "')";

try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/comentarios.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/comentarios.php?error=" . $e->getMessage());
}

