<?php 
	require_once ('Modelo/classConexion.php');
	require_once ('Modelo/classConsultas.php');
	require_once ('Controlador/cargar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Mis Productos</h1>
	<div>
		<form method='get'>
			<input type='text' name="buscar">
			<input type='submit' value='Buscar'>
		</form>
	</div>
	<?php 
		if (isset($_GET['buscar'])) {
			buscar($_GET['buscar']);
		}else{
			cargar();
		}
	?>
	<div>
		<a href="insertar.php">Nuevo Producto</a>
	</div>
</body>
</html>