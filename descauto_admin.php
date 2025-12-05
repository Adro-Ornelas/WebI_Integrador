<?php
require_once "conexion.php";

// Necesita id
$id = $_GET['id'];

// Obtener información del auto
$sql = "SELECT id, apodo, year, descripcion, marca, valorhora FROM auto WHERE id='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

// Obtener imágenes
$sql_img = "SELECT foto FROM foto_auto WHERE id_auto = '$id';";
$res_img = $conn->query($sql_img);

$imagenes = [];
while ($img = $res_img->fetch_assoc()) {
    $imagenes[] = $img["foto"];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>AoRent - Admin Vehículo</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/carousel.css">
</head>

<body>

    <!-- Navbar... (ya estaba en tu código original) -->
    <header>
        <div class="izquierda">
            <div class="menu-container">
                <div class="menu" id="menu">
                    <div></div><div></div><div></div>
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

    <main id="main">
        <div class="row pt-5 mt-5 align-items-center" style="gap: 2rem;">

            <!-- Carrusel de imágenes -->
            <div class="col">

                <div class="carousel-container">
                    <div id="carouselExampleDark" class="carousel carousel-dark" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <?php
                            if (count($imagenes) > 0) {
                                foreach ($imagenes as $index => $ruta) {
                                    echo '
                                    <div class="carousel-item ' . ($index === 0 ? "active" : "") . '">
                                        <img class="d-block w-100 main-image" src="' . $ruta . '" alt="Imagen del auto">
                                    </div>';
                                }
                            } else {
                                echo '
                                <div class="carousel-item active">
                                    <img class="d-block w-100 main-image" src="images/no-image.png" alt="Sin imagen">
                                </div>';
                            }
                            ?>
                        </div>

                        <!-- Indicadores -->
                        <div class="carousel-indicators carousel-indicators-thumb mx-auto">
                            <?php
                            foreach ($imagenes as $index => $ruta) {
                                echo '
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="' . $index . '" class="' . ($index === 0 ? "active" : "") . '">
                                    <img src="' . $ruta . '" alt="Miniatura">
                                </button>';
                            }
                            ?>
                        </div>

                    </div>
                </div>

            </div>

            <!-- FORMULARIO ADMIN -->
            <div class="col">

                <h2 class="text-center mb-4">Editar Vehículo</h2>

                <form method="POST" action="descauto_update.php">
                    <input type="hidden" name="id" value="<?= $id ?>">

                    <label class="form-label fw-bold">Apodo del vehículo</label>
                    <input type="text" name="apodo" class="form-control mb-3" value="<?= $row['apodo'] ?>" required>

                    <label class="form-label fw-bold">Marca</label>
                    <input type="text" name="marca" class="form-control mb-3" value="<?= $row['marca'] ?>" required>

                    <label class="form-label fw-bold">Año</label>
                    <input type="number" name="year" class="form-control mb-3" value="<?= $row['year'] ?>" required>

                    <label class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" class="form-control mb-3" rows="4" required><?= $row['descripcion'] ?></textarea>

                    <label class="form-label fw-bold">Valor por hora</label>
                    <input type="number" name="valorhora" class="form-control mb-4" value="<?= $row['valorhora'] ?>" required>

                    <!-- BOTONES -->
                    <div class="d-flex justify-content-between">

                        <!-- Eliminar -->
                        <a href="descauto_delete.php?id=<?= $id ?>"
                           onclick="return confirm('¿Seguro que deseas eliminar este vehículo? Esta acción no se puede deshacer.')"
                           class="btn btn-danger px-4">
                            Eliminar
                        </a>

                        <!-- Guardar -->
                        <button type="submit" class="btn btn-success px-4">
                            Confirmar cambios
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </main>

    <script src="js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
