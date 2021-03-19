<?php  

	require_once("includes/conexion.php");

	session_start();

	if(isset($_POST["submit"]))
	{

		// Recoger datos
		$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
		$apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : false;
		$email = isset($_POST["email"]) ? $_POST["email"] : false;
		$pass = isset($_POST["pass"]) ? $_POST["pass"] : false;

		// Validar datos
		$validados = array();

		if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
			$validados["nombre"] = "validado";
		}

		if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
			$validados["apellido"] = "validado";
		}

		if (!empty($email) && !is_numeric($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$validados["email"] = "validado";
		}

		if (!empty($pass)) {
			$validados["pass"] = "validado";
		}

		$guardarUsuario = false;
		if (count($validados) == 4) {
			// Insertar usuario en la bbdd
			$guardarUsuario = true;

			// Cifrar la contraseña
			$passwordSecure = password_hash($pass, PASSWORD_BCRYPT, ["cost"=>4]);

			$sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$apellidos', '$email', '$passwordSecure', now());";
			$guardar = mysqli_query($db, $sql);

			if ($guardar) {
				
				$_SESSION["completado"] = "El registro se ha completado con éxito";

			}

			header("Location: index.php");

		}
		else
		{
			$_SESSION["validados"] = $validados;
			header("Location: index.php");
		}

	}

?>



























