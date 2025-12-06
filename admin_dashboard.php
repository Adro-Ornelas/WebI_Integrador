<?php
require_once "auth_admin.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>


        <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&family=Momo+Trust+Sans:wght@200..800&family=Ms+Madi&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Estilos propios -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar.css">

        <link rel="stylesheet" href="css/admin_dashboard.css">

</head>
<body>

    <?php
    include 'includes/sidebar.php';
    ?>

<div class="container py-4 page-wrapper">

    <!-- Título -->
    <div class="row mb-4 title-row">
        <div class="col text-center">
            <h2 class="fw-bold">Panel de control</h2>
        </div>
    </div>

    <!-- Fila de tarjetas ocupando todo el alto -->
    <div class="row g-4 cards-row">

        <!-- Columna 1 -->
        <div class="col-md-4 d-flex">
            <div class="panel-card w-100 border border-black" onclick="window.location.href='faq_admin.php'">
                <img src="images/faq.png" alt="FAQ Icon">
                <h4 class="fw-bold text-center">FAQ</h4>
            </div>
        </div>

        <!-- Columna 2 -->
        <div class="col-md-4 d-flex">
            <div class="panel-card w-100 border border-black" onclick="window.location.href='solicitud_admin_lista.php'">
                <img src="images/solicitudes.png" alt="Solicitudes Icon">
                <h4 class="fw-bold text-center">Gestionar solicitudes</h4>
            </div>
        </div>

        <!-- Columna 3 -->
        <div class="col-md-4 d-flex">
            <div class="panel-card w-100 border border-black" onclick="window.location.href='flota.php'">
                <img src="images/flota.png" alt="Flota Icon">
                <h4 class="fw-bold text-center">Gestionar flota</h4>
            </div>
        </div>

    </div>

</div>

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
