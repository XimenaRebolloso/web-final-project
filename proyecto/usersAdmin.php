<?php
require './logica/conexion.php';

session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == "ADMIN"){
    $role = $_SESSION['role'];
}else{
    header("Location: http://localhost:8080/proyecto/index.php");
    return;
}

$username = $_SESSION['username'];
$q = "SELECT * FROM users WHERE role <> 'ADMIN'";
$query = mysqli_query($conexion, $q);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Admin | Second Chance Books</title>

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

        img {
            width: 70px;
            height: 70px;
        }

        a{
            text-decoration: none;
            font-size: 18px;
            color: #1a1a1a;
            transition: 0.3s ease;
        }

        a:hover{
            color: #088178;
        }

        .divButtons{
            margin:auto;
            margin-top: 5rem;
            font-size: 16px;
        }

        button{
            color:white;
            background-color: #088178;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            margin: auto;
            height: 30px;
            width: 150px;
        }
        button:hover{
            color: #222;
            background-color: #e3e6f3;
        }
    </style>
</head>

<body>
    <section id="header">
        <a href="index.php"><img src="./imagenes/logo-bgr.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <div class="dropdown">
                     <button class="dropbtn"><?php echo "<a>Bienvenido " . $username . "</a>"; ?></button>
                     <div class="dropdown-content">
                         <a href="./logica/logout.php">Cerrar sesión</a>
                    </div>
                </div> 
            </ul>
        </div>
    </section>
    <h4 style="text-align: center; margin:2rem;">Administrar usuarios</h4>

    <section>
    <table style="margin:auto;">
        <tr>
            <th>Id</th>
            <th>Nombre de usuario</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th></th>
            <th></th>
        </tr>

        <?php 
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $row['id'] ?></td>
                <td> <?php echo $row['username'] ?></td>
                <td> <?php echo $row['password'] ?></td>
                <td> <?php echo $row['role'] ?></td>
                <td> <button button style="margin-left:1rem;" onclick="window.location.href='./editUser.php?id=<?php echo $row['id'] ?> '">Editar</button> </td>
                <td> <button button style="margin-left:1rem;" onclick="window.location.href='./logica/deleteUser.php?id=<?php echo $row['id'] ?> '">Eliminar</button> </td>
            </tr>
        <?php
        }
        ?>

    </table>
    </section>

    <h4 style="text-align: center;  margin:2rem;">Insertar usuario</h4>
    <form action="./logica/crudUsers/insertUser.php" method="POST" enctype="multipart/form-data">
        <label for="id">ID</label>
        <input type="number" name="id">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username">
        <label for="password">Contraseña</label>
        <input type="text" name="password">
        <label for="role">Rol ( ADMIN ó CLIENT) </label>
        <input type="role" name="role">

        <button style="margin: 3rem auto  3rem auto;" type="submit">Insertar</button>

        <?php
        if (isset($_GET['error']))
            echo "<span>" . $_GET['error'] . "</span>";
        ?>
    </form>


    <script>
        let objeto = [
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?> {
                    id: <?php echo $row['id'] ?>,
                    name: "<?php echo $row['name'] ?>",
                    price: <?php echo $row['price'] ?>,
                    quantity: <?php echo $row['quantity'] ?>,
                    image: "<?php echo $row['image'] ?>"
                },
            <?php
            }
            ?>
        ]

        console.log(objeto);

    </script>
</body>

</html>