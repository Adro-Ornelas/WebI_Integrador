<?php
require_once "conexion.php";

$id = $_GET['id'];

// borrar imágenes
$conn->query("DELETE FROM foto_auto WHERE id_auto = '$id'");

// borrar auto
$conn->query("DELETE FROM auto WHERE id='$id'");

header("Location: flota.php?deleted=1");
?>