<?php

require '../conexion.php';

if (!isset($_POST["id"]) || !isset($_POST["name"]) || !isset($_POST["price"]) || !isset($_POST["quantity"])) {
    header("Location: http://localhost:8080/proyecto/productsAdmin.php?error=Datos incompletos");
}


$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];

$q = "UPDATE products SET name='" . $name . "', price = '" . $price . "', quantity = '" . $quantity . "' WHERE id =" . $id;

try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/productsAdmin.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/productsAdmin.php?error=" . $e->getMessage());
}
