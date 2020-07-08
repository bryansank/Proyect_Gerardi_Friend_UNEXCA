<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="signup">
    <h3>Registrate</h3>
        <form method="post" action="" name="signup">

            <label>Nombre</label>
                <input type="text" name="nameReg" />
            <label>Email</label>
                <input type="text" name="emailReg" />
            <label>Cedula</label>
                <input type="text" name="passportReg" />
            <label>Password</label>
                <input type="password" name="passwordReg" />

            <div class="errorMsg"><?php echo $errorMsgReg; ?></div>
            <input type="submit" class="button" name="signupSubmit" value="Signup">
        </form>
    </div>
</body>
</html>