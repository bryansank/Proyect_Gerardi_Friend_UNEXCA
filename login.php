<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="login">
        <h3>Login</h3>
        <form method="post" action="" name="login">
            <label for="name">Nombre
                <input id="name" type="text" name="nameInput" />
            </label>
            <label for="password">Contraseña
                <input id="password" type="password" name="passwordInput" />
            </label>
            <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>

            <input type="submit" class="button" name="notRegister" value="¿No registrado?" />
            <input type="submit" class="button" name="loginSubmit" value="Login" />
        </form>
    </div>
</body>
</html>