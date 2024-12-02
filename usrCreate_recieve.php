<html>

<head>
    <?php include 'menu.php'; ?>
</head>

<body>
    <?php
    $servidor = "localhost";
    $usuario = "root";
    $pwd = "";
    $bd = "bd_enterprise";

    $conexion = new mysqli($servidor, $usuario, $pwd, $bd);

    $Usuario = $_REQUEST['usr'];
    $PasswordCifrada = sha1($_REQUEST['pwd']);
    $tipo = $_REQUEST['tipo'];

    $query = $conexion->prepare("INSERT INTO usuario (Usuario, Password, Tipo) VALUES (?, ?, ?)");
    $query->bind_param("sss", $Usuario, $PasswordCifrada, $tipo);

    if ($query->execute()) {
        echo "Nuevo usuario registrado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    ?>
</body>

</html>