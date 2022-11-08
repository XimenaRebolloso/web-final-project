<?php

require './logica/conexion.php';

session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == "ADMIN"){
    $role = $_SESSION['role'];
}else{
    header("Location: http://localhost:8080/proyecto/login.php");
    return;
}

$id = $_GET['id'];

$q = "SELECT * FROM products WHERE id=" . $id;
$query = mysqli_query($conexion, $q);
$row = mysqli_fetch_array($query);


echo $row['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
            margin: auto;
        }

        form * {
            margin-bottom: 5px;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>


    <h2 style="text-align: center;">Insertar producto</h2>
    <form action="./logica/crudProd/updateProduct.php" method="POST">
        <label for="id">Código</label>
        <input type="number" readonly name="id" value="<?php echo $row['id'] ?>">
        <label for="name">Nombre</label>
        <input type="text" name="name" value="<?php echo $row['name'] ?>">
        <label for="price">Precio</label>
        <input type="number" name="price" value="<?php echo $row['price'] ?>">
        <label for="quantity">Existencias</label>
        <input type="number" name="quantity" value="<?php echo $row['quantity'] ?>">
        <button type="submit">Actualizar</button>

        <?php
        if (isset($_GET['error']))
            echo "<span>" . $_GET['error'] . "</span>";
        ?>
    </form>
</body>

</html>