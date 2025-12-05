<?php
require_once "conexion.php";

$id = $_POST['id'];
$apodo = $_POST['apodo'];
$marca = $_POST['marca'];
$year = $_POST['year'];
$descripcion = $_POST['descripcion'];
$valorhora = $_POST['valorhora'];

$sql = "UPDATE auto 
        SET apodo='$apodo', marca='$marca', year='$year', descripcion='$descripcion', valorhora='$valorhora'
        WHERE id='$id'";

if ($conn->query($sql)) {
    header("Location: auto_admin.php?id=".$id."&ok=1");
} else {
    echo "Error al actualizar: " . $conn->error;
}
