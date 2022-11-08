<?php
session_start();

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
}
else
    header("Location: http://localhost:8080/proyecto/login.php");

if($role  == "CLIENT"){
    header("Location: http://localhost:8080/proyecto/index.php");
}
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
        .divButtons button{
            color:white;
            background-color: #088178;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            margin: auto;
            height: 30px;
            width: 150px;
            margin-top:1rem;
        }
        .divButtons button:hover{
            color: #222;
            background-color: #e3e6f3;
        }
    </style>

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
    <div style="display: flex; flex-direction: column; margin:auto; margin-top:1rem;" class="divButtons">
        <?php
        if($role == "ADMIN") {
            ?>
            <div style="display: flex; margin: auto; flex-direction: column; padding: 3rem;">
                <label for="productos">Modulo para la administración de productos</label>
                <button onclick="window.location.href = './productsAdmin.php'">Administrar Productos</button> 
            </div>
            <div style="display: flex; margin: auto; flex-direction: column;">
                <label for="users">Modulo para la administración de usuarios</label>
                <button onclick="window.location.href = './usersAdmin.php'">Administrar Usuarios</button>
            </div>
        <?php
        }
        ?>
    </div>
    </body>
</head>


</html>