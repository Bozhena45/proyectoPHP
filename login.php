<?php  

	require_once "includes/conexion.php";

	session_start();

	if (isset($_POST)) {

		// Borrar error antiguo
		if(isset($_SESSION["errorLogin"]))
		{
			session_unset();
		}

		if(isset($_SESSION["usuario"]))
		{
			session_unset();
		}
		
		$email = trim($_POST["email"]);
		$pass = trim($_POST["pass"]);

		// Comprobar credenciales
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = mysqli_query($db, $sql);

		if ($login) {
			
			$usuario = mysqli_fetch_assoc($login);

			// Comporobar contraseña
			$verify =password_verify($pass, $usuario["password"]);

			if ($verify) {
				
				$_SESSION["usuario"] = $usuario;

			}
			else
			{

				$_SESSION["errorLogin"] = "Login incorrecto";

			}

		}

	}

	header("Location: index.php");

?>