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
    <?php
    include 'includes/sidebar.php';
    ?>
    <main id="main" class="row">
        <div class="row align-items-start pt-3 mt-5 mb-5 p-5" style="gap: 2rem;">
            <div class="col">
                <h1 style="color: black;">RENTA UN</h1>
                <h1 style="color: var(--topbar-color);">CARRO AHORA</h1>
                <p class="fs-5 m-auto">Para ofrecer el servicio más adecuado para cada ocasión, tenemos diversidad de
                    vehículos en la flota,
                    en constante mantenimiento y detallado para la mejor presentación. Los rangos de precios aproximados
                    son dentro del límite del Anillo Periférico Manuel Gómez Morin de la Zona Metropolitana de
                    Guadalajara (ZMG)</p>
                <a href="#" class="boton-catalogo mt-5 py-3">Ver Catálogo</a>
            </div>
            <div class="col">
                <div class="carousel-container">
                    <!-- Carrusel -->
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

                        <!-- Diapositivas Principales -->
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <img class="d-block w-100 main-image" src="images/car1.png" alt="Coche Deportivo 1">
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <img class="d-block w-100 main-image" src="images/car2.webp" alt="Coche Rojo 2">
                            </div>

                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <img class="d-block w-100 main-image" src="images/car3.webp" alt="Coche Azul 3">
                            </div>
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

                            <!-- Miniatura 1 -->
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1">
                                <img src="images/car1.png" alt="Miniatura 1">
                            </button>

                            <!-- Miniatura 2 -->
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                aria-label="Slide 2">
                                <img src="images/car2.webp" alt="Miniatura 2">
                            </button>

                            <!-- Miniatura 3 -->
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                aria-label="Slide 3">
                                <img src="images/car3.webp" alt="Miniatura 3">
                            </button>

                        </div>
                    </div>
                </div>

            </div>


        </div>

        <div id="catalogo">
            <div class="container">
                <div class="row">
                    <?php
                    include 'autos.php';
                    ?>
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