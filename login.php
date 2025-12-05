<?php
session_start();

require_once "conexion.php";

// Validar que vengan datos
if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    header("Location: login.php?error=1");
    exit;
}

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

// Evitar SQL Injection con prepared statements
$stmt = $conn->prepare("SELECT username FROM admin WHERE username = ? AND password = SHA2(?, 256) LIMIT 1");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {

    // Login correcto
    $_SESSION["admin"] = $username;

    header("Location: admin_dashboard.php");
    exit;

} else {
    // Login incorrecto
    header("Location: login.php?error=credenciales");
    exit;
}

$stmt->close();
$conn->close();
?>
