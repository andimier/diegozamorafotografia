<?php
	$extraParameters = "";

	function elementsSelection($table, $parameters, $colum, $value, $extraParameters) {
		if (isset($extraParameters) && !empty($extraParameters)) {
			return "SELECT " . $parameters . " FROM " . $table . " WHERE " . $colum . " = " . $value . " " . $extraParameters;
		} else {
			return "SELECT " . $parameters . " FROM " . $table . " WHERE " . $colum . " = " . $value;
		}
	}
	
	// METATAGS
	if (!empty($seccion)) {

		$q_metatags = "SELECT * FROM metatags WHERE seccion_id = $seccion";
		$r_metatags = mysqli_query($connection, $q_metatags);

		while($tag = mysqli_fetch_array($r_metatags)) {
			$palabras1    = $tag['palabras1'];
			$descripcion1 = $tag['descripcion1'];

			$palabras2    = $tag['palabras2'];
			$descripcion2 = $tag['descripcion2'];
		}
	}

	// REDES SOCIALES
	$q_redes = elementsSelection("contenidos", "*", "seccion_id", 7, "");
	$r_redes = mysqli_query($connection, $q_redes);

	while($link = mysqli_fetch_array($r_redes)) {
		$enlace[] = $link['contenido'];
	}

	// CONTACTO
	if ($tabla == 'contenidos') {
		$q_contacto =  elementsSelection("contenidos", "*", "seccion_id", 6, "");
	} else {
		$q_contacto =  elementsSelection("contenidos2", "*", "seccion_id", 7, "");
	}

	$r_contacto = mysqli_query($connection, $q_contacto);
	$f_contacto  = mysqli_fetch_assoc($r_contacto);
	$texto_contacto = $f_contacto['contenido'];

	if ($seccion == 1) {
		$q_contenidos = elementsSelection($tabla, "*", "seccion_id", $seccion, "");
		$r_contenidos = mysqli_query($connection, $q_contenidos);

		$fila = mysqli_fetch_assoc($r_contenidos);

		$titulo = $fila['titulo'];
		$texto = $fila['contenido'];

		if ($tabla == 'contenidos') {
			$q_fotografos = elementsSelection($tabla, "*", "seccion_id", 3, "AND borrable = 0");
		} else {
			$q_fotografos = elementsSelection($tabla, "*", "seccion_id", 3, "");
		}

		$r_fotografos = mysqli_query($connection, $q_fotografos);

		while ($foto = mysqli_fetch_array($r_fotografos)) {
			$nombre[] = $foto['titulo'];
			$bio[] = $foto['contenido'];
		}
	}

	if ($seccion == 2) {
		// SELECCIONAR EL ALBUM DEL FOTOGRAFO PRINCIPAL PARA SECCION PORTAFOLIO
		$q_contenidos =  elementsSelection("albumes", "*", "contenido_id", 24, "AND visible = 1");
		$r_contenidos = mysqli_query($connection, $q_contenidos);

		$fila  = mysqli_fetch_assoc($r_contenidos);
		$album = $fila['id'];

		// SELECCIONAR LAS IMAGENES DEL ALBUM VISIBLE

		$categorias_arr = array(
			0=>array(0=>'retrato',    1=>'portrait'),
			1=>array(0=>'documental', 1=>'documentary'),
			2=>array(0=>'urbano',     1=>'urban'),
			3=>array(0=>'personal',   1=>'personal')
		);
	}

	// FOTOGRAFOS
	if ($seccion == 3) {
		$q_contenidos = elementsSelection("contenidos", "*", "seccion_id", $seccion, "");
		$r_contenidos = mysqli_query($connection, $q_contenidos);
	}

	// CLIENTES
	if ($seccion == 4) {
		$q_contenidos = elementsSelection($tabla, "*", "seccion_id", $seccion, "");
		$r_contenidos = mysqli_query($connection, $q_contenidos);
	}

	// FOTOGRAFO
	if ($seccion == '') {

		if(isset($_GET['fotografo']) || isset( $_GET['photographer'])) {

			// NOMBRE
			if (isset( $_GET['fotografo'])) {
				$fotografo = $_GET['fotografo'];
			} else if (isset($_GET['photographer'])) {
				$fotografo = $_GET['photographer'];
			}

			$q_info =  elementsSelection($tabla, "id, titulo, contenido", "id", $fotografo, "");
			$r_info = mysqli_query($connection, $q_info);

			$fila  = mysqli_fetch_assoc($r_info);

			$id = $fila['id'];
			$nombre = $fila['titulo'];
			$bio = $fila['contenido'];


			// IMAGEN
			$q_foto =  elementsSelection("contenidos", "imagen2", "id", $fotografo, "");
	
			$r_foto = mysqli_query($connection, $q_foto);
			$foto  = mysqli_fetch_assoc($r_foto);

			$imagen = $foto['imagen2'];

			// IMAGENES DEL PORTAFOLIO DEL FOTOGRAFO
			//$q_album = "SELECT * FROM albumes WHERE contenido_id = ". $fotografo . " AND visible = 1";
			$q_album = elementsSelection("albumes", "*", "contenido_id", $fotografo, "AND visible = 1");
			$r_album = mysqli_query($connection, $q_album);

			if ($r_album) {
				$f_album = mysqli_fetch_assoc($r_album);
				$f_id = $f_album['id'];

				$q_imagenes = "SELECT * FROM imagenes_albums WHERE album_id = ". $f_id;
				$r_imagenes = mysqli_query($connection, $q_imagenes);
			} else {
				echo 'nada';
			}
		}
	}

	if ($seccion == 5) {
		$q_contenidos = "SELECT * FROM $tabla WHERE seccion_id = $seccion";
		$r_contenidos = mysqli_query($connection, $q_contenidos);
	}
?>