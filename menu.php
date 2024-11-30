<?php
session_start(); // Asegúrate de usar sesiones para mantener la información del usuario logueado.

// Verifica si el usuario está autenticado y tiene un tipo asignado
if (!isset($_SESSION['tipoUsuario'])) {
    header('Location: LogIn.php');
    exit();
}

$tipoUsuario = $_SESSION['tipoUsuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="menu.css">
</head>

<body>
    <ul>
        <?php if ($tipoUsuario === 'jefe'): ?>
            <!-- Menú para Jefe -->
            <li>
                <a>Trabajadores</a>
                <ul class="dropdown">
                    <li><a href="trabCreate.php">Agregar</a></li>
                    <li><a href="trabDelete.php">Eliminar</a></li>
                    <li><a href="trabEdit.php">Actualizar</a></li>
                    <li><a href="trabRead.php">Informacion</a></li>
                </ul>
            </li>
            <li>
                <a>Puestos</a>
                <ul class="dropdown">
                    <li><a href="puestoCreate.php">Agregar</a></li>
                    <li><a href="puestoDelete.php">Eliminar</a></li>
                    <li><a href="puestoEdit.php">Actualizar</a></li>
                    <li><a href="puestoRead.php">Informacion</a></li>
                </ul>
            </li>
            <li><a href="clienteRead.php">Clientes</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Facturas</a></li>

        <?php elseif ($tipoUsuario === 'administrador'): ?>
            <!-- Menú para Administrador -->
            <li>
                <a>Clientes</a>
                <ul class="dropdown">
                    <li><a href="clienteCreate.php">Agregar</a></li>
                    <li><a href="clienteRead.php">Informacion</a></li>
                    <li><a href="clienteEditar.php">Actualizar</a></li>
                    <li><a href="clienteDelete.php">Eliminar</a></li>
                </ul>
            </li>
            <li>
                <a>Proyectos</a>
                <ul class="dropdown">
                    <li><a href="proyectoCreate.php">Agregar</a></li>
                    <li><a href="proyectoRead.php">Informacion</a></li>
                    <li><a href="proyectoEdit.php">Actualizar</a></li>
                    <li><a href="proyectoDelete.php">Eliminar</a></li>
                </ul>
            </li>
            <li>
                <a>Asignaciones</a>
                <ul class="dropdown">
                    <li><a href="#">Agregar</a></li>
                    <li><a href="#">Informacion</a></li>
                    <li><a href="#">Eliminar</a></li>
                </ul>
            </li>
            <li><a href="#">Facturas</a></li>

        <?php elseif ($tipoUsuario === 'trabajador'): ?>
            <!-- Menú para Trabajador -->
            <li><a href="clienteRead.php">Cliente</a></li>
            <li><a href="#">Proyecto</a></li>
        <?php endif; ?>

        <!-- Opción común para todos -->
        <li><a href="LogIn.php">Salir</a></li>
    </ul>
</body>

</html>