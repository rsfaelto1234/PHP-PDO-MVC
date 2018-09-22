<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
</head>
<body>

<h1>Insertar Productos</h1>

	<form method="POST" action="Controlador/insertar.php">
		<table>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="nombre"></td>	
			</tr>
			<tr>
				<td>Descripción:</td>
				<td><textarea rows="10" cols="30" name="descripcion"></textarea></td>	
			</tr>
			<tr>
				<td>Categoría:</td>
				<td><input type="text" name="categoria"></td>	
			</tr>
			<tr>
				<td>Precio:</td>
				<td><input type="text" name="precio"></td>	
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Registar Producto"></td>	
			</tr>
		</table>
	</form>

	<div>
		<a href="verproductos.php">Ver mis productos</a>
	</div>	
</body>
</html>