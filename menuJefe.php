<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jefe</title>
    <link rel="stylesheet" href="menu.css">
</head>

<body>
    <ul>
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
                <li><a href="#">Actualizar</a></li>
                <li><a href="puestoRead.php">Informacion</a></li>
            </ul>
        </li>
        <li><a href="clienteRead.php">Clientes</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Facturas</a></li>
        <li><a href="LogIn.php">Salir</a></li>
    </ul>
</body>

</html>