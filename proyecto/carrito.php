<?php
require './logica/conexion.php';
session_start();

if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
else
    header("Location: http://localhost:8080/proyecto/login.php");

$q = "SELECT * FROM products";
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
    <title>Carrito | Second Chance Books</title>
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
    </style>
</head>

<body onload="delateProd();">
    <section id="header">
        <a href="index.php"><img src="./imagenes/logo-bgr.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="resenas.php">Reseñas</a></li>
                <li><a href="comentarios.php">Foro</a></li>
                <li><a class="active" href="carrito.php">Carrito</a></li>
                <div class="dropdown">
                     <button class="dropbtn"><?php echo "<a>Bienvenido " . $username . "</a>"; ?></button>
                     <div class="dropdown-content">
                         <a href="./logica/logout.php">Cerrar sesión</a>
                    </div>
                </div> 
            </ul>
        </div>
    </section>

    <section id="product" class="section-p1" style="display:flex ;">
        <div id="productos-car" style="flex-wrap: wrap; position: relative;"></div>
        <div id="divTotal">
            <h4>Total:</h4>
        </div>
    </section>

    <section class="divButtons">
        <button class="buttonCart" onclick="emptyCart();">Vaciar carrito</button>
        <button class="buttonCart" onclick="backToProducts();">Volver al catálogo</button>
        <button class="buttonCartPrim" onclick="finishBuy();">Terminar compra</button>
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

        function backToProducts(){
            window.location.href = "./catalogo.php";
        }

        function delateProd (){
            var variable = window.localStorage.getItem("prod");
            window.localStorage.removeItem("prod")
            var variable = window.localStorage.getItem("total");
            window.localStorage.removeItem("total")
        }
        var subTot = 0;

        var lsCarrito = window.localStorage.length;
        console.log(lsCarrito);

        //////
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
            console.log(precioProd);
            subTot = subTot + precioProd;
            // console.log(typeof num);

        }

        //console.log(subTot);
        var subTTexto = document.createElement('p');
        subTTexto.append("$" + subTot + ".00");
        var divTot = document.getElementById('divTotal');
        divTot.append(subTTexto);
        window.localStorage.setItem("total", subTot);

        function emptyCart(){
            localStorage.clear();
            //window.localStorage.setItem("total", subTot);
            window.location.href = "./catalogo.php";
        }

        function finishBuy(){
            window.localStorage.setItem("total", subTot);
            window.location.href = "./compra.php";
        }
    </script>
</body>

</html>