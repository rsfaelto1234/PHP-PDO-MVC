<?php 

	function cargar(){
		$consulta = new Consultas();
		$filas = $consulta->cargarProductos();

		echo "<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Categoría</th>
					<th>Precio</th>
				</tr>";

		foreach ($filas as $fila) {
			echo "<tr>";
			echo "<td>".$fila['id_producto']."</td>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['descripcion']."</td>";
			echo "<td>".$fila['categoria']."</td>";
			echo "<td>".$fila['precio']."</td>";
			echo "<td>
					  <form action='Controlador/eliminar.php' method='post'>
					  <input type='hidden' name='id_producto' value='".$fila['id_producto']."'>
					  <input type='submit' value='Eliminar'>
					  </form>
					  <form action='modificar.php' method='post'>
					  <input type='hidden' name='id_producto' value='".$fila['id_producto']."'>
					  <input type='submit' value='Modificar' >
					  </form>
				  </td>";
			echo "</tr>";
		}

		echo "</table>";
	}

	function buscar($nombre){
		$consulta = new Consultas();
		$filas = $consulta->buscarProductos($nombre);

		echo "<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Categoría</th>
					<th>Precio</th>
				</tr>";

		if (isset($filas)) {
			foreach ($filas as $fila) {
			echo "<tr>";
			echo "<td>".$fila['id_producto']."</td>";
			echo "<td>".$fila['nombre']."</td>";
			echo "<td>".$fila['descripcion']."</td>";
			echo "<td>".$fila['categoria']."</td>";
			echo "<td>".$fila['precio']."</td>";
			echo "<td>
					  <form action='Controlador/eliminar.php' method='post'>
					  <input type='hidden' name='id_producto' value='" .$fila['id_producto']. "'>
					  <input type='submit' value='Eliminar'>
					  </form>
					  <form action='modificar.php' method='post'>
					  <input type='hidden' name='id_producto' value='" .$fila['id_producto']. "'>
					  <input type='submit' value='Modificar' >
					  </form>
				  </td>";
			echo "</tr>";
		}

		echo "</table>";	
		}		
	}	
?>
