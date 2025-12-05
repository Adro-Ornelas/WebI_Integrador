<?php
require_once "conexion.php";

// Traer autos con UNA sola foto (la primera)
$sql = "SELECT a.id, a.apodo, a.year, a.descripcion, a.marca, a.valorhora, 
        (SELECT foto FROM foto_auto WHERE id_auto = a.id LIMIT 1) AS foto_principal
        FROM auto a";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($auto = $result->fetch_assoc()) {

        $foto = $auto['foto_principal'] != "" 
                ? $auto['foto_principal'] 
                : "https://via.placeholder.com/300x200?text=Sin+Foto";

        echo "
        <div class='col-md-4 mb-4'>
            <div class='card h-100 shadow-sm'>
                <img class='card-img-top' src='{$foto}' alt='{$auto['apodo']}'>
                <div class='card-body'>
                    <h5 class='card-title'>{$auto['apodo']} ({$auto['year']})</h5>
                    <p class='card-text'>
                        <strong>Marca:</strong> {$auto['marca']}<br>
                        <strong>Precio por hora:</strong> $ {$auto['valorhora']} MXN
                    </p>
                    <p class='card-text text-muted' style='font-size: 0.9rem;'>
                        ".substr($auto['descripcion'], 0, 120)."...
                    </p>
                    <a href='descauto.php?id={$auto['id']}' class='btn btn-primary w-100'>
                        Ver detalles
                    </a>
                </div>
            </div>
        </div>";
    }
} else {
    echo "<p>No hay vehículos registrados.</p>";
}
?>
