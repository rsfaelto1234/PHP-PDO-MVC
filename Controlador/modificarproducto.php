<?php 
	
	require_once ('../Modelo/classConexion.php');
	require_once ('../Modelo/classConsultas.php');

	$mensaje = null;
	$mensaje1 = null;
	$mensaje2 = null;
	$mensaje3 = null;
	$mensaje4 = null;

	$consultas = new Consultas();
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$categoria = $_POST['categoria'];
	$precio = $_POST['precio'];
	$id_producto = $_POST['id_producto'];
	
	if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($categoria) > 0 && strlen($precio) > 0){
		$mensaje = $consultas->modificarProducto("nombre", $nombre, $id_producto);
		$mensaje = $consultas->modificarProducto("descripcion", $descripcion, $id_producto);
		$mensaje = $consultas->modificarProducto("categoria", $categoria, $id_producto);
		$mensaje = $consultas->modificarProducto("precio", $precio, $id_producto);
		$mensaje = $consultas->modificarProducto("id_producto", $id_producto, $id_producto);

		echo '"'.$mensaje.'"<br><br>';	

		echo 'El Nombre del Producto es: "'. $nombre .'"<br>';
		echo 'La Descripcion del Producto es: "'. $descripcion .'"<br>';
		echo 'La Categoria del Producto es: "'. $categoria .'"<br>';
		echo 'El Precio del Producto es: "'. $precio .'"<br>';
		echo 'El ID del Producto es: "'. $id_producto .'"<br><br>';
	
		echo "<div><a href='../verproductos.php'>Ver Productos</a></div>";
	}else{
		echo "Por favor rellene todos los campos, todos son requeridos";
	}

?>