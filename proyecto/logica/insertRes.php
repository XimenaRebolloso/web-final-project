<?php

require 'conexion.php';

if (!isset($_POST["id"]) || !isset($_POST["book"]) || !isset($_POST["stars"]) || !isset($_POST["content"])) {
    header("Location: http://localhost:8080/proyecto/resenas.php?error=Datos incompletos");
    return;
}


$id = $_POST["id"];
$book = $_POST["book"];
$stars = $_POST["stars"];
$content = $_POST["content"];

$q = "INSERT INTO resenas VALUES ('" . $id . "', '" . $book . "', '" . $stars . "', '" . $content . "')";

try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/resenas.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/resenas.php?error=" . $e->getMessage());
}

