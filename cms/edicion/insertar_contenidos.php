<?php
	//INSERCION NUEVO CONTENIDO

	if(isset($_POST['insertar_contenido'])){

		$titulo = $_POST['titulo'];

		// INSERTAR CONTENIDO EN SECCION O SUB CONTEDIDO EN CONTEDIDO
		if (isset( $_POST['seccion_id'])  &&  !isset($_POST['contenido_id'])) {
			$seccion_id = $_POST['seccion_id'];
			$contenido_id = 0;

			// PASAR LA IMAGEN Si EL CONTENIDO NO ES INICIO NI TALLERES
			if ($seccion_id > 2 && $seccion_id < 6 ) {
				$imagen1 = 'imagenes/pequenas/photo.png';
				$imagen2 = 'imagenes/medianas/photo.png';
				$imagen3 = 'imagenes/grandes/photo.png';
			} else {
				$imagen = '';
			}

		} else if (isset( $_POST['seccion_id']) && isset( $_POST['contenido_id'])) {

			$seccion_id = $_POST['seccion_id'];
			$contenido_id = $_POST['contenido_id'];
		}

		$errores = array();

		$required_fields = array('titulo');
		$imagenprovisional = "imagenes/pequenas/photo.png";

		foreach($required_fields as $fieldname){
			if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))) {
				$errores[] = $fieldname;
			}
		}

		if (empty($errores)) {

			$indice = 0;
			$borrable = 1;

			// CREACION DEL CONTENIDO
			$query = "INSERT INTO contenidos ";
			$query .= "(fecha, titulo, seccion_id, contenido_id, imagen1, imagen2, imagen3, indice, borrable) ";
			$query .= "VALUES ";
			$query .= "('{$fecha}', '{$titulo}', '{$seccion_id}', '{$contenido_id}', '{$imagen1}', '{$imagen2}', '{$imagen3}', '{$indice}', '{$borrable}')";

			$result = mysqli_query($connection, $query);

			if (mysqli_affected_rows($connection) > 0) {
				$mensaje = "Contenido creado correctamente";
			} else {
				echo "No se creo nada - " . mysql_error();
			}
		} else {
			$mensaje = "Debes ingresar un titulo!!";
		}
	}
?>