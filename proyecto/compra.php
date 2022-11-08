<?php
require './logica/conexion.php';
session_start();

if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
else
    header("Location: http://localhost:8080/proyecto/login.php");

$q = "SELECT * FROM compras";
$query = mysqli_query($conexion, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Compra | Second Chance Books</title>
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

        h2
        {
            text-align: center;
            padding: 1.5rem 0 1.5rem 1rem;
            
        }
        
        #totProd{
            margin-left:100px;
        }

        p
        {
            font-size: 18px;
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
                <li><a href="comentarios.php">Foro</a></li>
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
    <section id="product" class="section-p1">
        <h2>¡Gracias por tu compra!</h2>
        <div id="totProd"></div>
        <div id="productos-car" style="flex-wrap: wrap; position: relative;"></div>

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

    <script>
        var lsCarrito = window.localStorage.length;
        var lsCarritoT = window.localStorage.length-1;
        //console.log(lsCarrito);
        var prod = document.createElement('p');
        prod.append(document.createTextNode("El total de productos de tu compra son: " + lsCarritoT ));
        var prod2 = document.createElement('p');
        prod2.append(document.createTextNode("Puedes depositar a la cuenta bancaria: 7845 9856 1254 4563, para recibir un seguimiento de envio"));
        
        var divP = document.getElementById('totProd');
        var vart = window.localStorage.getItem("total");
        var total = JSON.parse(vart);

        divP.append(prod);
        divP.append(prod2);
        divP.append("$" + total + ".00");

        for (let i = 0; i < lsCarrito; i++) {
            var divProd = document.createElement('div');

            var variable = window.localStorage.getItem("variable" + (i));
            //console.log("id"+variable);
            var prod = JSON.parse(variable);

            console.log(prod);
            var nombre = document.createElement('h4');
            nombre.append(document.createTextNode(prod.name));

            var precio = document.createElement('p');
            precio.append(document.createTextNode(prod.price));
            precio.className = 'divCart-p';

            var img = document.createElement('img');
            img.src = prod.image;
            img.className = 'imgCart';

            divProd.append(nombre);
            divProd.append(precio);
            divProd.append(img);
            divProd.setAttribute('id', prod.id);
            divProd.className = 'divCart';

            var divP = document.getElementById('productos-car');
            divP.append(divProd);

            var precioProd = Number(prod.pricenum);
            //console.log(precioProd);
            //subTot = subTot + precioProd;
            // console.log(typeof num);

        }
        window.onunload = localStorage.clear();
    </script>
</body>
</html>