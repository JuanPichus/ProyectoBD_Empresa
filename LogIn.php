<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>

<body>
    <form action="LoginConnection.php" method="post">
        <p>Usuario:
            <input type="text" name="Usr" required>
        </p>
        <p>Contraseña:
            <input type="text" name="Pwd" required>
        </p>
        <input type="submit" name="Login" value="Login">
    </form>
</body>

</html>