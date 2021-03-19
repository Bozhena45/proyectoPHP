<?php  

	require_once "conexion.php";
	require_once "includes/helpers.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

	<header>
		
		<div id="logo">
			<a href="index.php">
				Blog de videojuegos
			</a>
		</div>

		<?php  

			$categorias = conseguirCategorias($db);

		?>
		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
				
				<?php while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
					<li><a href="categoria.php?id=<?=$categoria["id"] ?>"><?= $categoria["nombre"] ?></a></li>
				<?php  endwhile; ?>

				<li><a href="">Sobre mi</a></li>
				<li><a href="">Contacto</a></li>
			</ul>
		</nav>

	</header>