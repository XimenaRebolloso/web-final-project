<?php

require '../conexion.php';

if (!isset($_POST["id"]) || !isset($_POST["name"]) || !isset($_POST["price"]) || !isset($_POST["quantity"]) || !isset($_FILES["imagen"]) || $_FILES["imagen"]["name"] == "") {
    header("Location: http://localhost:8080/proyecto/productsAdmin.php?error=Datos incompletos");
    return;
}


$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];

$imagen = $_FILES["imagen"]["name"];
$tipo = $_FILES["imagen"]["type"];
$temp = $_FILES["imagen"]["tmp_name"];

if (!strpos($tipo, 'gif') && !strpos($tipo, 'jpeg') && !strpos($tipo, 'webp')) {
    header("Location: http://localhost:8080/proyecto/productsAdmin.php?error=Formato de imagen incorrecto");
    return;
}

$q = "INSERT INTO products VALUES ('" . $id . "', '" . $name . "', '" . $price . "', '" . $quantity . "','" . $imagen . "')";


try {
    $query = mysqli_query($conexion, $q);
    move_uploaded_file($temp, "../imagenes/" . $imagen);
    header("Location: http://localhost:8080/proyecto/productsAdmin.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/productsAdmin.php?error=" . $e->getMessage());
}
