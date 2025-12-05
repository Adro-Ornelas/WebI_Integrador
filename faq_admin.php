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
    <title>Administrar FAQ</title>

    <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&family=Momo+Trust+Sans:wght@200..800&family=Ms+Madi&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body class="bg-light">

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
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <nav>
            <ul>
                <li><a href="index.html">
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
                    <a href="#" class="selected">
                        <i class="bxr  bxs-message-question-mark"></i>
                        <span>FaQ</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>


    <div class="container py-5 my-5">
        <h1 class="h1 text-center mb-4">FAQ - Administrar</h1>
        <p class="text-center">Editar, eliminar o agregar preguntas frecuentes</p>

        <form action="faq_guardar.php" method="POST">
            <div class="accordion" id="faqAccordion">

                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <?php
                        $id = $row["id"];
                        $titulo = htmlspecialchars($row["titulo"]);
                        $contenido = htmlspecialchars($row["contenido"]);
                        ?>

                        <div class="accordion-item my-4 border border-dark">
                            <h2 class="accordion-header" id="heading<?= $id ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?= $id ?>">
                                    <input type="text" name="titulo[<?= $id ?>]"
                                        class="form-control border-0 bg-transparent fw-bold" value="<?= $titulo ?>">
                                </button>
                            </h2>

                            <div id="collapse<?= $id ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">

                                    <textarea name="contenido[<?= $id ?>]" class="form-control"
                                        rows="4"><?= $contenido ?></textarea>

                                    <!-- Botón eliminar -->
                                    <div class="text-end mt-2">
                                        <a href="faq_eliminar.php?id=<?= $id ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar esta pregunta?')">
                                            Eliminar
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center">No hay preguntas frecuentes registradas.</p>
                <?php endif; ?>

            </div>



            <!-- Botones finales -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-4">Realizar cambios</button>
                <button id="btnNewQuestion" type="button" class="btn btn-primary px-4">Agregar pregunta</a>


            </div>
        </form>
        <!-- FORMULARIO PARA AGREGAR UNA NUEVA PREGUNTA -->
        <div id="formNewQuestion" class="card mt-5 border-dark">
            <div class="card-header bg-primary text-white">
                <strong>Agregar nueva pregunta</strong>
            </div>
            <div class="card-body">

                <form action="faq_insertar.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Título de la pregunta</label>
                        <input type="text" name="titulo_nuevo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contenido o respuesta</label>
                        <textarea name="contenido_nuevo" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Agregar Pregunta</button>
                </form>

            </div>
        </div>
    </div>

    <script>

                // Que el botón agrgar pregunta haga aparecer o desaparecer el formulario
        const btnNewQuestion = document.getElementById('btnNewQuestion');
        const formNewQuestion = document.getElementById('formNewQuestion');
        formNewQuestion.style.display = 'none';

        btnNewQuestion.addEventListener('click', function () {
            if (formNewQuestion.style.display === 'none') {
                formNewQuestion.style.display = 'block';
                formNewQuestion.scrollIntoView();
            } else {
                formNewQuestion.style.display = 'none';                
            }
        });


    </script>

    <script src="js/sidebar.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php $conn->close(); ?>