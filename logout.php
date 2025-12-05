<?php
session_start();
session_unset();
session_destroy();

// Regresa al index al cerrar sesión
header("Location: index.php");

exit;
?>
