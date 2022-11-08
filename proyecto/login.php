<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous" />
    <title>Iniciar sesión | Second Chance Books</title>

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
                <li><a class="active" href="login.php"><i class="fa solid fa-user"></i></a></li>
            </ul>
        </div>
    </section>
    
    <form action="./logica/login.php" method="POST">
        <div style= "display: block ruby;">
            <h1>Inicia sesión</h1>
            <a href="signup.php" style = "margin-left: 195px; font-size: 16px;">Registro</a>
        </div>
        <label for="user">Usuario: </label>
        <input name="user" id="user" type="text">
        <label for="pass">Contraseña: </label>
        <input name="pass" id="pass" type="password">
        <button type="submit" class="buttonSubmit">Iniciar sesión</button>
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
        /*var passInput = document.getElementById("passInput");
        var userInput = document.getElementById("userInput");
        var checkInput = document.getElementById("check");

        var userSection = document.getElementById("userSection");

        var error = 0;

        function login() {
            Validar
            if (!isFormValid()) {
                console.log("Los datos son incorrectos");
                error = 1;
                return;
            }


            Login
            if (checkInput.checked) {
                window.localStorage.setItem("user", userInput.value);
                window.localStorage.setItem("pass", passInput.value);
                window.localStorage.setItem("check", checkInput.value);
            }
            else {
                window.localStorage.clear();
                window.localStorage.setItem("user", "");
                window.localStorage.setItem("pass", "");
                window.localStorage.setItem("check", "");
                console.log("No se checo el box");
            }
            //console.log("Login!");
        }

        function onLoad() {
            let user = localStorage.getItem("user");
            let pass = localStorage.getItem("pass");
            let check = localStorage.getItem("check");

            if (user != null) {
                userInput.value = user;
            }
            if (pass != null) {
                passInput.value = pass;
            }
            if (check == "on") {
                checkInput.value = check;
            }
        }

        function isFormValid() {
            if (userInput.value == "" && error < 1) {
                let error = document.createElement("span");
                error.innerText = "El usuario no puede quedar vacio";
                error.classList.add("textError");
                userSection.append(error);
                if (passInput.value == "") {
                    let error = document.createElement("span");
                    error.innerText = "La contraseña no puede quedar vacia";
                    error.classList.add("textError");
                    passSection.append(error);
                    return false;
                }
            }
            return true;
        }*/
    </script>
</body>

</html>