<?php 

function conseguirCategorias($conexion)
{

	$sql = "SELECT * FROM categorias";
	$categorias = mysqli_query($conexion, $sql);

	$result = array();

	if($categorias)
	{
		$result = $categorias;
	}

	return $result;

}

 ?>