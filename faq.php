<?php

// Para que la sidebar detecte si es usuario admin o clientes
session_start();

require_once "conexion.php";

// Obtener FAQs de la BD
$sql = "SELECT id, titulo, contenido FROM faq ORDER BY id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Frecuentes</title>



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
</head>

<body class="bg-light">

    <?php
    include 'includes/sidebar.php';
    ?>



    <div class="container py-5 my-5">
        <h1 class="h1 text-center mb-4">FAQ</h1>
        <p class="text-center">Preguntas Frecuentes</p>

        <div class="accordion" id="faqAccordion">

            <?php
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $id = $row["id"];
                    $titulo = htmlspecialchars($row["titulo"]);
                    $contenido = nl2br(htmlspecialchars($row["contenido"]));
                    ?>

                    <div class="accordion-item my-4 border border-dark">
                        <h2 class="accordion-header" id="heading<?php echo $id; ?>">
                            <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $id; ?>">
                                <?php echo $titulo; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $id; ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-4">
                                <?php echo $contenido; ?>
                            </div>
                        </div>
                    </div>

                    <?php
                endwhile;
            else:
                ?>
                <p class="text-center">No hay preguntas frecuentes registradas.</p>
            <?php endif; ?>

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

<?php $conn->close(); ?>