<?php 

	class Consultas {

	 	public function insertarProducto($arg_nombre, $arg_descripcion, $arg_categoria, $arg_precio)
	 	{
	 		//Creamos un objeto de (Conexion) que se va guardar en la variable $modelo
	 		$modelo = new Conexion(); 
	 		//Creamos una variable ($conexion) para guardar a la variable $modelo y traer la función get_conexion de la (Clase Conexion)
	 		$conexion = $modelo->get_conexion(); 
	 		//Creamos una variable ($sql) para hacer la consulta (Query) a la base de datos, poner los parametros de la Tabla con (:) para evitar los ataques de SQL INYECCION
	 		$sql = "INSERT INTO productos (nombre, descripcion, categoria, precio) VALUES (:nombre, :descripcion, :categoria, :precio)";
	 		//Creamos una variable ($statement) para llamar a la conexion ($conexion) para preparar la consulta con el método (prepare) y pasar la variable ($sql) donde esta la instrucción sql para ejecutar a la base de datos
	 		$statement = $conexion->prepare($sql);
	 		//Invocar a la variable ($statement) para traer a la funcion (bindParam) para llamar a los argumentos de mi función : $arg_nombre, $arg_descripcion, $arg_categoria, $arg_precio de los campos de la tabla (productos)
	 		$statement->bindParam(":nombre", $arg_nombre);
	 		$statement->bindParam(":descripcion", $arg_descripcion);
	 		$statement->bindParam(":categoria", $arg_categoria);
	 		$statement->bindParam(":precio", $arg_precio);

	 		//Hacemos una validación si la variable $statement no tiene ningún dato
	 		if (!$statement) {
	 		//Retornamos un mensaje de error
	 			return "Error al crear el Registro";	
	 		}else { //Si la variable $statement tiene datos correctos
	 		//Ejecutará la consulta con el método (execute)
	 			$statement->execute();
	 		//Retornamos un mensaje de éxito
	 			return "Registro creado correctamente";		
	 		}
	 		//Cerramos la conexión con el método (close)
	 		$statement->close();
	 	}

	 	public function cargarProductos(){
	 		//Creamos una variable ($rows) que va ser un arreglo con valor nulo (null)
	 		$rows = null;
	 		//Creamos un objeto de (Conexion) que se va guardar en la variable $modelo
	 		$modelo = new Conexion();
	 		//Creamos una variable ($conexion) para guardar a la variable $modelo y traer la función get_conexion de la (Clase Conexion)
	 		$conexion = $modelo->get_conexion();
	 		//Creamos una variable ($sql) para hacer la consulta (Query) a la base de datos
	 		$sql = "SELECT * FROM productos";
	 		//Creamos una variable ($statement) para llamar a la conexion ($conexion) para preparar la consulta con el método (prepare) y pasar la variable ($sql) donde esta la instrucción sql para ejecutar a la base de datos
	 		$statement = $conexion->prepare($sql);
	 		//Ejecutará la consulta con el método (execute)
	 		$statement->execute();

	 		//Vamos a recorrer el resultado de la consulta, creamos una variable ($resultado) que va ser igual a la variable ($statement) y llamar al método (fetch)
	 		while ($resultado = $statement->fetch()) {
	 		//La variable ($rows) lo convertimos en un arreglo ([]) va ser igual a la variable ($resultado) para guardar el resultado
	 			$rows[] = $resultado;	
	 		}
	 		//Retornamos la variable ($rows)
	 		return $rows;
	 		//Cerramos la conexión con el método (close)
	 		$statement->close();		 	
	 	}

	 	public function eliminarProducto($arg_id_producto){
	 		//Creamos un objeto de (Conexion) que se va guardar en la variable $modelo
	 		$modelo = new Conexion();
	 		//Creamos una variable ($conexion) para guardar a la variable $modelo y traer la función get_conexion de la (Clase Conexion)
	 		$conexion = $modelo->get_conexion();
	 		//Creamos una variable ($sql) para hacer la consulta (Query) a la base de datos
	 		$sql = "DELETE FROM productos WHERE id_producto = :id_producto";
	 		//Creamos una variable ($statement) para llamar a la conexion ($conexion) para preparar la consulta con el método (prepare) y pasar la variable ($sql) donde esta la instrucción sql para ejecutar a la base de datos
	 		$statement = $conexion->prepare($sql);
	 		//Invocar a la variable ($statement) para traer a la funcion (bindParam) para llamar a los argumentos de mi función : $arg_id_producto del campo de la tabla (productos)
	 		$statement->bindParam(":id_producto", $arg_id_producto);

	 		//Hacemos una validación si la variable $statement no tiene ningún dato
	 		if (!$statement) {
	 			//Retornamos un mensaje de error
            	return "Error al eliminar producto";
         	}else{
         		//Ejecutará la consulta con el método (execute)
         		$statement->execute();
         		//Retornamos un mensaje de éxito
                return "Producto eliminado correctamente";
         	}
         	//Cerramos la conexión con el método (close)
         	$statement->close();
	 	}

	 	public function buscarProductos($arg_nombre){
	 		//Creamos una variable ($rows) que va ser un arreglo con valor nulo (null)
	 		$rows = null;
	 		//Creamos un objeto de (Conexion) que se va guardar en la variable $modelo
	 		$modelo = new Conexion();
	 		//Creamos una variable ($conexion) para guardar a la variable $modelo y traer la función get_conexion de la (Clase Conexion)
	 		$conexion = $modelo->get_conexion();
	 		//Creamos una variable ($nombre) para guardar la variable ($arg_nombre) concatenado el (%) para buscar mediante la consulta ($sql)
	 		$nombre = "%".$arg_nombre."%";
	 		//Creamos una variable ($sql) para hacer la consulta (Query) a la base de datos
	 		$sql = "SELECT * FROM productos WHERE nombre like :nombre";
	 		//Creamos una variable ($statement) para llamar a la conexion ($conexion) para preparar la consulta con el método (prepare) y pasar la variable ($sql) donde esta la instrucción sql para ejecutar a la base de datos
	 		$statement = $conexion->prepare($sql);
	 		//Invocar a la variable ($statement) para traer a la funcion (bindParam) para llamar a la variable ($nombre) concatenado el (%) para hacer la consulta
	 		$statement->bindParam(":nombre", $nombre);
	 		//Ejecutará la consulta con el método (execute)
	 		$statement->execute();

	 		//Vamos a recorrer el resultado de la consulta, creamos una variable ($resultado) que va ser igual a la variable ($statement) y llamar al método (fetch)
	 		while ($resultado = $statement->fetch()) {
	 		//La variable ($rows) lo convertimos en un arreglo ([]) va ser igual a la variable ($resultado) para guardar el resultado
	 			$rows[] = $resultado;	
	 		}
	 		//Retornamos la variable ($rows)
	 		return $rows;
	 		//Cerramos la conexión con el método (close)
	 		$statement->close();	
	 	}

	 	public function cargarProducto($arg_id_producto){
	 		//Creamos una variable ($rows) que va ser un arreglo con valor nulo (null)
	 		$rows = null;
	 		//Creamos un objeto de (Conexion) que se va guardar en la variable $modelo
	 		$modelo = new Conexion();
	 		//Creamos una variable ($conexion) para guardar a la variable $modelo y traer la función get_conexion de la (Clase Conexion)
	 		$conexion = $modelo->get_conexion();
	 		//Creamos una variable ($sql) para hacer la consulta (Query) a la base de datos
	 		$sql = "SELECT * FROM productos WHERE id_producto = :id_producto";
	 		//Creamos una variable ($statement) para llamar a la conexion ($conexion) para preparar la consulta con el método (prepare) y pasar la variable ($sql) donde esta la instrucción sql para ejecutar a la base de datos
	 		$statement = $conexion->prepare($sql);
	 		//Invocar a la variable ($statement) para traer a la funcion (bindParam) para llamar a los argumentos de mi función : $arg_id_producto del campo de la tabla (productos)
	 		$statement->bindParam(":id_producto", $arg_id_producto);
	 		//Ejecutará la consulta con el método (execute)
	 		$statement->execute();

	 		//Vamos a recorrer el resultado de la consulta, creamos una variable ($resultado) que va ser igual a la variable ($statement) y llamar al método (fetch)
	 		while ($resultado = $statement->fetch()) {
	 		//La variable ($rows) lo convertimos en un arreglo ([]) va ser igual a la variable ($resultado) para guardar el resultado
	 			$rows[] = $resultado;	
	 		}
	 		//Retornamos la variable ($rows)
	 		return $rows;
	 		//Cerramos la conexión con el método (close)
	 		$statement->close();		
	 	}

	 	public function modificarProducto($arg_campo, $arg_valor, $arg_id_producto){
	 		//Creamos un objeto de (Conexion) que se va guardar en la variable $modelo
	 		$modelo = new Conexion();
	 		//Creamos una variable ($conexion) para guardar a la variable $modelo y traer la función get_conexion de la (Clase Conexion)
	 		$conexion = $modelo->get_conexion();
	 		//Creamos una variable ($sql) para hacer la consulta (Query) a la base de datos
	 		$sql = "UPDATE productos SET $arg_campo = :valor WHERE id_producto = :id_producto";
	 		//Creamos una variable ($statement) para llamar a la conexion ($conexion) para preparar la consulta con el método (prepare) y pasar la variable ($sql) donde esta la instrucción sql para ejecutar a la base de datos
	 		$statement = $conexion->prepare($sql);
	 		//Invocar a la variable ($statement) para traer a la funcion (bindParam) para llamar a los argumentos de mi función : $arg_valor , $id_producto del campo de la tabla (productos)
	 		$statement->bindParam(":valor", $arg_valor);
	 		$statement->bindParam(":id_producto",  $arg_id_producto);

	 		//Hacemos una validación si la variable $statement no tiene ningún dato
	 		 if (!$statement) {
	 			//Retornamos un mensaje de error
            	return "Error al modificar el producto";
         	}else{
         		//Ejecutará la consulta con el método (execute)
         		$statement->execute();
         		//Retornamos un mensaje de éxito
                return "Producto modificado exitosamente";
         	} 
         	//Cerramos la conexión con el método (close)
         	$statement->close(); 
	 	}
	}
?>