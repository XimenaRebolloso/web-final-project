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

$q = "SELECT * FROM users WHERE id=" . $id;
$query = mysqli_query($conexion, $q);
$row = mysqli_fetch_array($query);


echo $row['username'];
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


    <h2 style="text-align: center;">Editar usuario</h2>
    <form action="./logica/crudusers/updateUser.php" method="POST">
        <label for="id">ID</label>
        <input type="number" readonly name="id" value="<?php echo $row['id'] ?>">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" value="<?php echo $row['username'] ?>">
        <label for="password">Contraseña</label>
        <input type="text" name="password" value="<?php echo $row['password'] ?>">
        <label for="role">Rol ( ADMIN O CLIENT )</label>
        <input type="text" name="role" value="<?php echo $row['role'] ?>">
        <button type="submit">Actualizar</button>

        <?php
        if (isset($_GET['error']))
            echo "<span>" . $_GET['error'] . "</span>";
        ?>
    </form>
</body>

</html>