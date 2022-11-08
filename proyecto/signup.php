<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
    <title>Registro | Second Chance Books</title>

    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
            margin: auto;
            margin-top: 3rem;
        }

        form * {
            margin-bottom: 5px;
        }

        span {
            color: red;
        }

        input{
            height: 30px;
            font-size: 16px;
        }

        button{
            margin-top: 10px;
            height: 25px;
            font-size: 16px;
        }
    </style>
</head>

<body onload="onLoad();">
    <section id="header">
        <a href="index.php"><img src="./imagenes/logo-bgr.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="resenas.php">Reseñas</a></li>
                <li><a href="comentarios.php">Foro</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <li><a style= "color: #dabbb9;" href="login.php"><i class="fa solid fa-user"></i></a></li>
            </ul>
        </div>
    </section>
    
    <form action="./logica/signup.php" method="POST" enctype="multipart/form-data">
        <div style= "display: block ruby;">
            <h1>Registro</h1>
            <a href="login.php" style = "margin-left: 250px; font-size: 16px;">Iniciar sesión</a>
        </div>
        <label for="id">ID</label>
        <input type="number" name="id">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username">
        <label for="password">Contraseña</label>
        <input type="password" name="password">
        <button type="submit" class="buttonSubmitForum">Registrar</button>
        <?php
        if (isset($_GET['error']))
            echo "<span>" . $_GET['error'] . "</span>";
        ?>
    </form>

    <footer class="section-p1">
        <div class="col">
            <img src="./imagenes/logo-bgr.png" class="logo" alt="">
            <h4>Siguenos</h4>
            <div class="follow">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
            <div class="derechos">
                <p>© 2022, Second Chance Books - Derechos reservados</p>
            </div>
        </div>
    </footer>

    <script>
    </script>
</body>

</html>