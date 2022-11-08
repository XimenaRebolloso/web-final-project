<?php
require './logica/conexion.php';
session_start();

if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
else
    header("Location: http://localhost:8080/proyecto/login.php");

$q = "SELECT * FROM products";
$query = mysqli_query($conexion, $q);

$qT = "SELECT * FROM products";
$queryT = mysqli_query($conexion, $qT)
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
    <title>Catálogo | Second Chance Books</title>
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

<body">

    <section id="header">
        <a href="index.php"><img src="./imagenes/logo-bgr.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="catalogo.php">Catálogo</a></li>
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
    
    <h2 style="text-align: center; padding: 1.5rem 0 1rem 0;">Nuestros libros</h2>
    <section id="product" class="section-catal">
    <?php 
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="div-prod">
                <img src="./imagenes/<?php echo $row['image'] ?>" alt="imagen" class="img-prod" onclick="window.location.href='./producto.php?id= <?php echo $row['id'] ?> '"></img>
                <h4> <?php echo $row['name'] ?></h4>
                <p> $<?php echo $row['price'] ?>.00</p>
                <button onclick="addCart('<?php echo $row['id'] ?>')">Añadir al carrito</button>
            </div>
        <?php
        }
        ?>
    </section>

    <!--<section id="product" class="section-p1">
        <h2>Nuestros libros</h2>
        <p style="text-align: center;">Busca tus libros favoritos</p>
        <div id="productos" style="display: flex; flex-wrap: wrap; position: relative; justify-content: center;"></div>
    </section>-->

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
       let objeto = [
            <?php
            while ($rowT = mysqli_fetch_array($queryT)) {
            ?> {
                    id: <?php echo $rowT['id'] ?>,
                    name: "<?php echo $rowT['name'] ?>",
                    price: "$<?php echo $rowT['price'] ?>.00",
                    pricenum: "<?php echo $rowT['price'] ?>",
                    quantity: <?php echo $rowT['quantity'] ?>,
                    image: "./imagenes/<?php echo $rowT['image'] ?>",
                },
            <?php
            }
            ?>
        ]

        console.log(objeto);
        let pos = 0;
        //var objectsCart = {}
        /*var prodCart = {
            product: [
            ]

        }
        
        var object = {
            productsCount: 10,
            products: [
                {
                    name: "To Paradise",
                    price: "$250.00",
                    id: 1,
                    img: "./imagenes/img1.jpg",
                    pricenum: "250.00",
                },
                {
                    name: "The Ship",
                    price: "$200.00",
                    id: 2,
                    img: "./imagenes/img2.jpg",
                    pricenum: "200.00",
                },
                {
                    name: "Fangirl",
                    price: "$180.00",
                    id: 3,
                    img: "./imagenes/img3.jpg",
                    pricenum: "180.00",
                },
                {
                    name: "Little Life",
                    price: "$340.00",
                    id: 4,
                    img: "./imagenes/img4.jpg",
                    pricenum: "340.00",
                },
                {
                    name: "Fleabag",
                    price: "$150.00",
                    id: 5,
                    img: "./imagenes/img5.jpg",
                    pricenum: "150.00",
                },
                {
                    name: "The Handmaid's Tale",
                    price: "$260.00",
                    id: 6,
                    img: "./imagenes/img6.jpg",
                    pricenum: "260.00",
                },
                {
                    name: "Human Acts",
                    price: "$270.00",
                    id: 7,
                    img: "./imagenes/img7.jpg",
                    pricenum: "270.00",
                },
                {
                    name: "Know My Name",
                    price: "$190.00",
                    id: 8,
                    img: "./imagenes/img8.jpg",
                    pricenum: "190.00",
                },
                {
                    name: "Yolk",
                    price: "$100.00",
                    id: 9,
                    img: "./imagenes/img9.jpg",
                    pricenum: "100.00",
                },
                {
                    name: "The Vegetarian",
                    price: "$300.00",
                    id: 10,
                    img: "./imagenes/img10.jpg",
                    pricenum: "300.00",
                }
            ]
        }*/
        //console.log(object);
        //console.log(JSON.stringify(object));
        //window.localStorage.getItem("variable",JSON.stringify(object));

        //window.localStorage.setItem("variable", JSON.stringify(object));

        /*function putProduct() {

            for (var i = 0; i < 11; i++) {
                var divProd = document.createElement('div');
                var img = document.createElement('img');
                img.src = object.products[i].img;
                img.className = "img-prod";
                img.onclick = showProduct;

                var nombre = document.createElement('h4');
                nombre.append(document.createTextNode(object.products[i].name));

                var precio = document.createElement('p');
                precio.append(document.createTextNode(object.products[i].price));

                var boton = document.createElement('button');
                boton.type = "button";
                boton.append(document.createTextNode('Agregar al carrito'));
                boton.onclick = addCart;

                divProd.append(img);
                divProd.append(nombre);
                divProd.append(precio);
                divProd.append(boton);
                divProd.setAttribute('id', i);
                divProd.className = "div-prod";

                var nDiv = document.getElementById('productos');
                nDiv.append(divProd);
            }
        }*/

        function goToCheckout() {
            window.location.href = "./checkout.php";
        }

        function emptyCart() {
            localStorage.clear();
        }

        function addCart(id) {
            console.log(id);
            window.localStorage.setItem("variable"+pos, JSON.stringify(objeto[id-1]));
            pos++;
            console.log(objeto[id-1]);
            //window.localStorage.setItem("variable" + id, id);
            /*var prod = document.getElementById(event.target.parentElement.id);
            var idp = prod.id;
            window.localStorage.setItem("variable", JSON.stringify(object.products[idp]));
            //objectsCart.append(variable);
            //console.log(object.products[idp]);
            //prodCart.product[pos] = object.products[idp];
            window.localStorage.setItem("variable" + pos, JSON.stringify(object.products[idp]));
            //i++;
            //console.log(pos);*/ 
        }

        function showProduct(event) {
            var prod = document.getElementById(event.target.parentElement.id);
            var idp = prod.id;
            console.log(idp);
            window.localStorage.setItem("prod", JSON.stringify(object.products[idp]));
            window.location.href = "./producto.php";
        }
    </script>
</body>

</html>