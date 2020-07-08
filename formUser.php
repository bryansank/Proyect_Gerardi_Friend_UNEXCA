<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Delina Carter</title>
	<!--<link rel="stylesheet" type="text/css" href="css/miestilo.css" />-->
	<!--<script type="text/javascript"  lenguage="javascript" src="./js/funciones.js"></script>-->
	<link rel="stylesheet" href="style.css" />
</head>
<body>

<?php

	include("config.php");
	include('class/userClass.php');

	$userClass = new userClass();

	$errorMsgReg='';
	$errorMsgLogin='';

	/* Entrar Form */
	if (!empty($_POST['loginSubmit'])) {//Aqui validamos si se preciono el boton de "Entrar"
		//Si es empty lo que llega por post entonces no se preciono asi que retorna true, aqui validamos si llega
		//false, ya que preguntamos lo contrario a vacio osea !empty

		$UserAndEmail=$_POST['UserAndEmail'];//Aqui asiganmos el valor del atributo de php "name='UserAndEmail'"
		$Password=$_POST['Password'];

		if( strlen(trim($UserAndEmail)) > 1 && strlen(trim($Password))>1 ){
			//Aqui le hacemos strlen funcion que devuelve 0 si la cadena no tiene nada 
			//y trim elimina espacios al final de la cadena ademas de que preguntamos si el valor
			//de strlen es mayor a 1 dando asi que no esta vacia...

			$objUser = $userClass->userLogin($UserAndEmail,$Password);
			//Aqui designamos a objUser la clase de UserClass usando el metodo userLogin, le pasamos
			//como parametros el usuario o el email y la contraseña para verificar si existe 
			//en la base de datos para hacerle login al usuario.

			if($objUser){
				$url = BASE_URL.'home.php';
				header("Location: $url"); // Aqui retornamos a las personas a la vista Home.php
				echo "eeeeey";
			}
			else{
				$errorMsgLogin="Por favor, revisa el formulario.";
				//echo "eeeeey chabaleee";
			}
		}
	}


	/* Registrarte Form  <---- exactamente igual funciona que "Entrar form" */
	if (!empty($_POST['btnSignupSubmit'])) {

		$NameReg = $_POST['NameReg'];
		$EmailReg = $_POST['EmailReg'];
		$UserNameReg = $_POST['UserNameReg'];
		$PasswordReg = $_POST['PasswordReg'];
		
		/* Regular expression check para evitar cosas raras.... ("troleos")*/
		$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $UserNameReg);
		$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $EmailReg);
		$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $PasswordReg);

		if($username_check && $email_check && $password_check && strlen(trim($NameReg))>0) {

			$objUser = $userClass->userRegistration($UserNameReg,$PasswordReg,$EmailReg,$NameReg);

			if($objUser){
				$url=BASE_URL.'home.php';
				header("Location: $url"); 
			}else{
				$errorMsgReg="Apodo o Email ya existe, intente otros.";
			}
		}else{
			$errorMsgReg="Apodo o Email ya existe, intente otros.";
		}
	}

	
?>

<!-- Codigo del form para Login -->

	<div id="container-login">
		<h3>Iniciar Sesion</h3>
		<form method="post" action="" name="login">
			<label for="inputUserAndEmail">Usuario o Correo:</label>
			<input id="inputUserAndEmail" type="text" name="UserAndEmail" />
			<label for="inputPassword">Contraseña:</label>
			<input id="inputPassword" type="password" name="Password" />
			<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
			<input id="btnLoginSubmit" type="submit" class="button" name="loginSubmit" value="Entrar" />
		</form>
	</div>

<!-- FIN DE LOGIN -->

<!-- Codigo del form para Register -->
	<div id="signup">
		<h3>Registrate</h3>
		<form method="post" action="" name="signup">
			<label for="NameReg">Nombre:</label>
			<input id="inputNameReg" type="text" name="NameReg" />
			<label for="inputEmailReg">Correo:</label>
			<input id="inputEmailReg" type="text" name="EmailReg" />
			<label for="inputUserNameReg">Apodo:</label>
			<input id="inputUserNameReg" type="text" name="UserNameReg" />
			<label for="inputPasswordReg">Contraseña:</label>
			<input id="inputPasswordReg" type="password" name="PasswordReg" />

			<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
			<input id="btnSignupSubmit" type="submit" class="button" name="btnSignupSubmit" value="Registrate">
		</form>
	</div>
<!-- FIN DE REGISTER -->

</body>
</html>

