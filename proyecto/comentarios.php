<?php
session_start();

if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
else
    header("Location: http://localhost:8080/proyecto/login.php");
    
require './logica/conexion.php';
    
$q = "SELECT * FROM forum";
$query = mysqli_query($conexion, $q);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
    <title>Foro | Second Chance Books</title>
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
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
            margin: 0 0 0 1rem ;
        }

        form * {
            margin-bottom: 5px;
        }

        span {
            color: red;
        }  
        
        .inputSec{
            height: 25px;
            font-size: 16px;
        }
        .inputRev{
            height: 200px;
            font-size: 16px;
        }

        label{
            font-weight: 600;
            font-size: 16px;
        }

        h5
        {
            text-align: justify;
            padding: 1.5rem 0 1.5rem 1rem;
            font-size: 22px;
        }
    </style>
</head>
<body>
    <section id="header">
        <a href="index.php"><img src="./imagenes/logo-bgr.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="resenas.php">Reseñas</a></li>
                <li><a class="active" href="comentarios.php">Foro</a></li>
                <li><a href="carrito.php">Carrito</a></li>
                <div class="dropdown">
                     <button class="dropbtn"><?php echo "<a>Bienvenido " . $username . "</a>"; ?></button>
                     <div class="dropdown-content">
                         <a href="./logica/logout.php">Cerrar sesión</a>
                    </div>
                </div> 
            </ul>
        </div>
    </section>

    <section id="section-coment">
        <h4>Foro de discusiones</h4>
        <h2>Bienvenidos al foro de discusiones <br> de Second Chance Books</h2>
        <p>En este foro puedes colocar tus opiniones personales acerca de algún libro, 
            para que alguien más responda <br>o siga los comentarios que tu hagas. 
            Ten en cuenta, que todo debe de ser con respeto y nos hacemos cargo <br>de 
            revisar que ninguna de las discusiones inflijan con nuestros lineamientos.
            <br><br>¡Disfruta!
        </p>
    </section>
    <section class="section-p2">
    <?php 
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="forumDiv">
                <div>
                    <?php echo $row['username'] ?>
                </div>
                <div>
                    <?php echo $row['subject'] ?> estrellas
                </div>
                <div>
                    <?php echo $row['content'] ?>
                </div>
            </div>
        <?php
        }
        ?>
        <h5>Agregar discusión</h5>
        <form action="./logica/insertForum.php" method="POST" enctype="multipart/form-data">
        <label for="usuername">Usuario</label>
        <input type="text" name="username" class="inputSec">
        <label for="subject">Tema</label>
        <input type="text" name="subject" class="inputSec">
        <label for="content">Comentario</label>
        <input type="text" name="content" class="inputRev">

        <button type="submit" class="buttonSubmitForum" >Subir comentario</button>

        <?php
        if (isset($_GET['error']))
            echo "<span>" . $_GET['error'] . "</span>";
        ?>
        </form>
    </section>

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
    <script src="./comentarios.js"></script>
</body>
</html>