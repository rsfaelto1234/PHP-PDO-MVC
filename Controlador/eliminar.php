<?php 

	require_once ('../Modelo/classConexion.php');
	require_once ('../Modelo/classConsultas.php');

	if (isset($_POST['id_producto'])){
		$id_producto = $_POST['id_producto'];
		$consultas = new Consultas();
		$mensaje = $consultas->eliminarProducto($id_producto);
		echo $mensaje;
		echo "<div><a href='../verproductos.php'>Volver a mis productos</a></div>";
	}else{
		echo "No ha llegado el id_producto a eliminar.php";
	}
?>