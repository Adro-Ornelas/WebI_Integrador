<?php
require_once "auth_admin.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Admin</title>
</head>
<body>

<h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['admin']); ?></h1>
<a href="logout.php">Cerrar sesión</a>

</body>
</html>
