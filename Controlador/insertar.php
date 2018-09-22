<?php 

	require_once ('../Modelo/classConexion.php');
	require_once ('../Modelo/classConsultas.php');

	$mensaje = null;

	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$categoria = $_POST['categoria'];
	$precio = $_POST['precio'];

	if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($categoria) > 0 && strlen($precio) > 0) {
		$consultas = new Consultas();
		$mensaje = $consultas->insertarProducto($nombre, $descripcion, $categoria, $precio);
		echo "<br><a href='../insertar.php'>Nuevo Producto</a><br>";
		echo "<br><a href='../verproductos.php'>Ver Productos</a><br>";
	}else{
		echo "Porfavor completa todos los campos";
		echo "<br><a href='../insertar.php'>Nuevo Producto</a><br>";
	}
	echo $mensaje;

?>