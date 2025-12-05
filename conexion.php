<?php
// conexion.php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ao_rent_auto";

$conn = new mysqli($host, $user, $pass, $dbname);

// Revisar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>