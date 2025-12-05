<?php

require_once "conexion.php";

// Necesita id
$id = $_GET['id'];

// Obtner información del auto

// Obtener FAQs de la BD
$sql = "SELECT id, apodo, year, descripcion, marca, valorhora FROM auto WHERE id='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

// Obtiene imágenes de autos
$sql_img = "SELECT foto FROM foto_auto WHERE id_auto = '$id';";
$res_img = $conn->query($sql_img);

// Guardamos las rutas en un arreglo para usarlo varias veces
$imagenes = [];
while ($img = $res_img->fetch_assoc()) {
    $imagenes[] = $img["foto"];
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AoRent</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&family=Momo+Trust+Sans:wght@200..800&family=Ms+Madi&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap local para desarrollo offline BORRAR AL FINAL -->
    <!-- <link rel="stylesheet" href="/home/usuario1/Documents/WebI/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="/home/usuario1/Documents/WebI/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="/home/usuario1/Documents/WebI/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script> -->

    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/carousel.css">


</head>

<body>
    <header>
        <div class="izquierda">
            <div class="menu-container">
                <div class="menu" id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <div class="brand">
            <h1 class="nombre">AoRent</h1>
        </div>

        <div class="derecha">
            <a href="login.html">Iniciar Sesión</a>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <nav>
            <ul>
                <li>
                    <a href="#" class="selected">
                        <i class="bxr  bxs-home-alt-2"></i>
                        <span>Inicio</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="bxr  bxs-book-bookmark"></i>
                        <span>Catalogo</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bxr  bxs-message-question-mark"></i>
                        <span>FaQ</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <main id="main">
        <div class="row pt-3 mt-5 align-items-center" style="gap: 2rem;">

            <div class="col">
                <div class="carousel-container">
                    <!-- Carrusel -->
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

                        <!-- Diapositivas Principales -->
                        <div class="carousel-inner">

                            <?php
                            if (count($imagenes) > 0) {
            foreach($imagenes as $index => $ruta){

                                    echo '<div class="carousel-item ' .
                                    ($index === 0 ? "active":"")
                                    . '">
                        <img class="d-block w-100 main-image" src="' . $ruta . '" alt="Imagen del auto">
                    </div>';

                                }
                            } else {
                                // Si no hay imágenes, insertar una por defecto
                                echo '
                <div class="carousel-item active">
                    <img class="d-block w-100 main-image" src="images/no-image.png" alt="Sin imagen">
                </div>';
                            }
                            ?>
                        </div>

                        <!-- Controles (Flechas) -->
                        <!-- Nota: Usamos data-bs-target y data-bs-slide para compatibilidad total con Bootstrap 5 -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark bg-opacity-50 rounded p-3"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark bg-opacity-50 rounded p-3"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>

                        <!-- Indicadores (Miniaturas) -->
                        <div class="carousel-indicators carousel-indicators-thumb mx-auto">
   <?php
            if (count($imagenes) > 0) {
                foreach ($imagenes as $index => $ruta) {

                    echo '
                    <button type="button" 
                        data-bs-target="#carouselExampleDark" 
                        data-bs-slide-to="'.$index.'" 
                        class="'.($index === 0 ? "active" : "").'"
                        aria-label="Slide '.($index+1).'">
                        <img src="'.$ruta.'" alt="Miniatura '.($index+1).'">
                    </button>';
                }
            }
            ?>

                        </div>
                    </div>
                </div>

            </div>


            <div class="col">

                <h2 id="autoName" class="fs-1 text-center" style="color: black;">
                    <?= $row['apodo'] ?>
                </h2>
                <h2 class="fs-2 text-center" style="color: black;">
                    <?php
                    echo $row['marca'] . " - " . $row['year']
                        ?>
                </h2>
                <h2 class="fs-3">
                    <dt>Descripción:</dt>
                </h2>
                <p id="autoDesc" class="fs-5 m-auto">
                    <?= $row['descripcion'] ?>
                </p>

                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-column justify-content-end mx-5">
                        <h2 class="h2 mt-4">
                            $ <?= $row['valorhora'] ?>
                        </h2>
                        <h2 class="fs-4 text-secondary">(POR HORA)</h2>
                        <a href="solicitud.php?id=<?=$id?>"
                         class="btn btn-secondary rounded-pill mt-5 py-3">Solicitar reserva</a>
                    </div>
                </div>

            </div>



        </div>
    </main>

    <script src="js/sidebar.js" async defer></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>