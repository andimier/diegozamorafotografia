<?php
	$message = "";

	// INSERCION DE LA IMAGEN
	if (isset($_POST['insertar_imagen'])) {

		date_default_timezone_set('America/Bogota');

		$fecha = date("Y-m-j");
		$tabla   = $_POST['tabla'];
		$id      = $_POST['campo_id'];
		$campo 	 = $_POST['campo'];

		$archivo = $_FILES['nombre_archivo'];  // ==> ARRAY !!

		$temp_path      = $archivo['tmp_name'];
		$nombre_archivo = basename($archivo['name']);
		$nombre_archivo = preg_replace('#[^a-z.0-9_-]#i',"-",$nombre_archivo);

		$extensiones = array('jpg','png');
		$ex_ext = explode('.', $nombre_archivo);
		$extension = end($ex_ext);
		$extension = strtolower($extension);

		//EXIF DATA
		// exif_read_data() reads the EXIF headers from a JPEG or TIFF image file. This way you
		// can read meta data generated by digital cameras.
		if ($extension == 'jpg') {
			$imagenexif = $_FILES['nombre_archivo']['tmp_name'];

			if (exif_read_data($imagenexif, 0, true)) {
				$exif = exif_read_data($imagenexif, 0, true);

				if (!isset($exif['FILE']['FileSize'])) {
					$exif_data = '';
				} else {
					if (isset($exif['IFD0']['Copyright'])) {
						$exif_data =  $exif['IFD0']['Copyright'];
					} else {
						$exif_data = '';
					}
				}
			} else {
				$exif_data = '';
			}
		} else {
			$exif_data = '';
		}

		if ($_FILES['nombre_archivo']['error'] == 1) {
			$mensaje = '<div id="mensaje_negativo">el archivo que seleccionaste es demasiado grande</div>';
		} else if ($_FILES['nombre_archivo']['error'] == 4) {
			$mensaje = '<div id="mensaje_negativo">no has seleccionado una imagen</div>';
		} else if (file_exists('imagenes/pequenas/' . $nombre_archivo)) {
			$mensaje = '<div id="mensaje_negativo">el archivo ya existe, seleciona otro diferente o cambia el nombre</div>';
		} else if ($extension != $extensiones[0] && $extension != $extensiones[1]) {
			$mensaje = '<div id="mensaje_negativo">el tipo de archivos no es valido</div>';
		} else {
			$destino = "imagenes/grandes/"  . $nombre_archivo;

			$ruta1   = "imagenes/pequenas/" . $nombre_archivo;
			$ruta2   = "imagenes/medianas/" . $nombre_archivo;
			$ruta3   = "imagenes/grandes/"  . $nombre_archivo;

			if (move_uploaded_file($temp_path, $destino)) {
				$sql  = "INSERT INTO $tabla";
				$sql .= " ( {$campo}, fecha_creacion, exif_data, imagen1, imagen2, imagen3 ) ";
				$sql .= " VALUES ";
				$sql .= " ( $id, '$fecha', '$exif_data', '$ruta1', '$ruta2', '$ruta3' )";

				if ($update = mysqli_query($connection, $sql)) {

					if (mysqli_affected_rows($connection)==1) {
						$mensaje = '<div id="mensaje_positivo">Imagen insertada correctamete</div>';
					} else {
						$mensaje = "Fall�!!<br />" . mysql_error();
					}

					// REDUCCION DE IMAGEN
					require_once("edicion/edc_imagenes/img_reduccion.php");

					$archivo_origen   =  $ruta3;
					$destino_medianas =  $ruta2;
					$ruta_pequenas    =  $ruta1;

					reducir_imagen($archivo_origen, $destino_medianas, $extension, $ruta_pequenas);
				} else {
					echo mysql_error();
				}
			} else {
				$mensaje= "NADA" . mysql_error();
			}
		}
	}
?>