<?php

require 'conexion.php';

$id = $_GET['id'];

$q = "DELETE FROM users WHERE id = " . $id;

echo $q;

try {
    $query = mysqli_query($conexion, $q);
    header("Location: http://localhost:8080/proyecto/usersAdmin.php");
} catch (Exception $e) {
    header("Location: http://localhost:8080/proyecto/UsersAdmin.php?error=" . $e->getMessage());
}
