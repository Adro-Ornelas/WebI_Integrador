<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
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
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $id; ?>">
                    <?php echo $titulo; ?>
                </button>
            </h2>
            <div id="collapse<?php echo $id; ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
