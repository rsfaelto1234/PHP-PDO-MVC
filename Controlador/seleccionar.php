<?php 

	function seleccionar(){
		if (isset($_POST['id_producto'])) {
			$consultas = new Consultas();
			$id_producto = $_POST['id_producto'];
			$filas = $consultas->cargarProducto($id_producto);

			foreach ($filas as $fila) {
				echo '
					<form action="Controlador/modificarproducto.php" method="POST">
						<table>
							<tr>
								<td>Nombre:</td>
								<td><input type="text" name="nombre" value="'.$fila['nombre'].'"></td>	
							</tr>
							<tr>
								<td>Descripción:</td>
								<td><textarea rows="10" cols="30" name="descripcion">'.$fila['descripcion'].'</textarea></td>	
							</tr>
							<tr>
								<td>Categoría:</td>
								<td><input type="text" name="categoria" value="'.$fila['categoria'].'"></td>
							</tr>
							<tr>
								<td>Precio:</td>
								<td><input type="text" name="precio" value="'.$fila['precio'].'"></td>	
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="hidden" name="id_producto" value="'.$id_producto.'"></td>	
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" value="Modificar Producto"></td>	
							</tr>
						</table>
					</form>
				';	
			}
		}	
	}
?>