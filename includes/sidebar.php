<aside>

		<?php if(isset($_SESSION["usuario"])): ?>
			<div id="usuarioLogin">
				<h3><?="Bienvenido " . $_SESSION["usuario"]["nombre"] . " " . $_SESSION["usuario"]["apellidos"] ?></h3>
				<a href="">Crear entradas</a>
				<a href="">Mis datos</a>
				<a href="">Crear categorias</a>
				<a href="">Cerrar sesión</a>
			</div>
		<?php endif; ?>

		<div id="login">

			<h3>Identificate</h3>

			<?php if(isset($_SESSION["errorLogin"])): ?>
				<div id="errorLogin">
					<h3><?=$_SESSION["errorLogin"]?></h3>
				</div>
			<?php endif; ?>

			<form action="login.php" method="POST">

				<label for="email">Email</label>
				<input type="email" name="email">

				<label for="pass">Contraseña</label>
				<input type="password" name="pass">

				<input type="submit" value="Enviar">

			</form>
			
		</div>

		<div id="register">

			<h3>Registrate</h3>

			<?php 

				if (isset($_SESSION["completado"])) {
					echo $_SESSION["completado"];
				}

			?>

			<form action="registro.php" method="POST">

				<label for="nombre">Nombre</label>
				<input type="text" name="nombre">

				<label for="apellidos">Apellidos</label>
				<input type="text" name="apellidos">

				<label for="email">Email</label>
				<input type="email" name="email">

				<label for="pass">Contraseña</label>
				<input type="password" name="pass">

				<input type="submit" name="submit" value="Enviar">

			</form>
			
		</div>

	</aside>