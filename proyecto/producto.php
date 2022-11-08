<?php
require './logica/conexion.php';
session_start();

if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
else
    header("Location: http://localhost:8080/proyecto/login.php");

$id = $_GET['id'];

$q = "SELECT * FROM products WHERE id=" . $id;
$query = mysqli_query($conexion, $q);
$row = mysqli_fetch_array($query);

//echo $row['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
    <title>Libro | Second Chance Books</title>
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

    <!--<section id="detProd" class="section-p1">
        <div id="products" style="display: flex; flex-wrap: wrap; position: relative;"></div>
    </section>-->

    <section class="section-p1">
        <div class="div-prod-single">
            <img src="./imagenes/<?php echo $row['image'] ?>" alt="imagen" class="img-prod"></img>
            <h4> <?php echo $row['name'] ?></h4>
            <p> $<?php echo $row['price'] ?>.00</p>
            <button>Añadir al carrito</button>
        </div>
    </section>

    <div id="div-prod-sin" class="section-p1">
        <h4>Sinopsis</h4>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus amet odio nisi voluptatem accusamus quas
            debitis impedit facilis, consequatur deserunt quam? Rerum commodi laudantium placeat beatae unde dolor
            aspernatur velit?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, minus sit adipisci saepe minima quis nostrum
            error et tenetur nobis ut reiciendis inventore quia, ipsa dolores, ducimus doloribus quas esse!
        </p>
        <h4>Información adicional</h4><br>
        <h5>ISBN</h5>
        <p>9786073808545</p>
        <h5>Edición</h5>
        <p>1ra Edición</p>
        <h5>Idioma</h5>
        <p>Inglés</p>
    </div>

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
        /*let pos = 0;

        var divProd = document.createElement('div');
        var variable = window.localStorage.getItem("prod");
        var prod = JSON.parse(variable);
        //console.log(prod.id); 
        var tempID = prod.id;
        console.log(tempID);
        //console.log(prod);

        var img = document.createElement('img');
        img.src = prod.img;
        //img.className = 'imgCart';

        var nombre = document.createElement('h4');
        nombre.append(document.createTextNode(prod.name));

        var precio = document.createElement('p');
        precio.append(document.createTextNode(prod.price));

        //Seccion de el select dinamico//
        var form = document.createElement('h5');
        form.append(document.createTextNode("Formato"));
        form.className = 'div-prod-single-h5';

        var formato = document.createElement('select');
        let newOption1 = new Option('Pasta blanda', 'pblanda');
        let newOption2 = new Option('Pasta dura', 'pdura');
        formato.add(newOption1, undefined);
        formato.add(newOption2, undefined);
        formato.className = 'div-prod-single-sel';
        formato.setAttribute('id', 'formato');
        //fin select formato//

        //Seccion del select estado
        var edo = document.createElement('h5');
        edo.append(document.createTextNode("Estado"));
        edo.className = 'div-prod-single-h5-e';

        var estado = document.createElement('select');
        let newOption1e = new Option('Nuevo', 'nuevo');
        let newOption2e = new Option('Bueno', 'bueno');
        let newOption3e = new Option('Muy bueno', 'mbueno');
        let newOption4e = new Option('Como nuevo', 'cnuevo');
        estado.add(newOption1e, undefined);
        estado.add(newOption2e, undefined);
        estado.add(newOption3e, undefined);
        estado.add(newOption4e, undefined);
        estado.className = 'div-prod-single-sel-e';
        estado.setAttribute('id', 'estado');
        estado.onchange = getFormEdo;

        //Fin seccion del select estado 

        //boton
        var boton = document.createElement('button');
        boton.type = "button";
        boton.append(document.createTextNode('Agregar al carrito'));
        boton.onclick = addCart;
        //boton


        divProd.append(img);
        divProd.append(nombre);
        divProd.append(precio);
        divProd.append(form);
        divProd.append(formato);
        divProd.append(edo);
        divProd.append(estado);
        divProd.append(boton);

        divProd.className = 'div-prod-single';

        var nDiv = document.getElementById('products');
        nDiv.append(divProd);

        function getFormEdo() {
            var userForm = document.getElementById('formato').value;
            var userEdo = document.getElementById('estado').value;

            localStorage.setItem('formato', userForm);
            localStorage.setItem('estado', userEdo);

        }

        function addCart(event) {
           // var prod = document.getElementById(event.target.parentElement.id);
            //var idp = prod.id;
            //window.localStorage.setItem("variable", JSON.stringify(object.products[idp]));
            //objectsCart.append(variable);
            //console.log(object.products[idp]);
            //prodCart.product[pos] = object.products[idp];
            //window.localStorage.setItem("singleVariable" + pos, JSON.stringify(object.products[idp]));
            window.localStorage.setItem("singleVariable" + pos, tempID);
            pos++;
            //i++;
            //console.log(pos); 
        }*/
    </script>
</body>

</html>