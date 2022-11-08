<?php
require './logica/conexion.php';

session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] == "ADMIN"){
    $role = $_SESSION['role'];
}else{
    header("Location: http://localhost:8080/proyecto/login.php");
    return;
}

$username = $_SESSION['username'];
$q = "SELECT * FROM products";
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
    <h4 style="text-align: center; margin:2rem;">Administrar productos</h4>
    <section>
        <table style="margin:auto;">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Imagen</th>
                <th></th>
                <th></th>
            </tr>
        <?php 
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $row['id'] ?></td>
                <td> <?php echo $row['name'] ?></td>
                <td> <?php echo $row['price'] ?></td>
                <td> <?php echo $row['quantity'] ?></td>
                <td> <img src="./imagenes/<?php echo $row['image'] ?>" alt="imagen" /></td>
                <td> <button style="margin-left:1rem;" onclick="window.location.href='./editProduct.php?id= <?php echo $row['id'] ?> '">Editar</button> </td>
                <td> <button style="margin-left:1rem;" onclick="window.location.href='./logica/deleteProduct.php?id= <?php echo $row['id'] ?> '">Eliminar</button> </td>
            </tr>
        <?php
        }
        ?>
        </table>
    </section>
    
    <h4 style="text-align: center;  margin:2rem;">Insertar producto</h4>
    <form action="./logica/crudprod/insertProduct.php" method="POST" enctype="multipart/form-data">
        <label for="id">Código</label>
        <input type="number" name="id">
        <label for="name">Nombre</label>
        <input type="text" name="name">
        <label for="price">Precio</label>
        <input type="number" name="price">
        <label for="quantity">Existencias</label>
        <input type="number" name="quantity">

        <label for="imagen">Imagen</label>
        <input onchange="previewImage(this);" type="file" name="imagen">
        <img src="#" alt="imagen" id="imagePreview" />

        <button style="margin-bottom:3rem;" type="submit">Insertar</button>

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

        function previewImage(target) {
            let imagePreview = document.getElementById("imagePreview");
            if (target.files && target.files[0]) {
                let url = URL.createObjectURL(target.files[0]);
                imagePreview.src = url;
            }
        }
    </script>
</body>

</html>