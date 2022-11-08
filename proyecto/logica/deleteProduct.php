<?php

require 'conexion.php';

$id = $_GET['id'];

$q = "DELETE FROM products WHERE id = " . $id;

echo $q;

try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/productsAdmin.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/productsAdmin.php?error=" . $e->getMessage());
}
