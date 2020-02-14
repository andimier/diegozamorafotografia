<?php
require_once("../includes/session.php");
require_once("../includes/connection.php");

	function borrarImagenPrincipal($imagenprincipal) {
		global $connection;

		if($imagenprincipal !== 'imagenes/pequenas/photo.png' && file_exists($imagenprincipal)){
			$explotarnombre = explode("/", $imagenprincipal);
			$nombrearchivo  = $explotarnombre[2];

			$nombreA = "../imagenes/pequenas/" . $nombrearchivo;
			$nombreB = "../imagenes/medianas/" . $nombrearchivo;
			$nombreC = "../imagenes/grandes/"  . $nombrearchivo;

			unlink($nombreA);
			unlink($nombreB);
			unlink($nombreC);
		}
	}

	function borrarImagenesAlbum($id) {
		global $connection;

		$imagenes = "SELECT * FROM imagenes_albums WHERE album_id = {$id}";
		$album = mysqli_query($connection, $imagenes);
		$num_imagenes = mysqli_num_rows($album);
		$affectedRows = 0;

		if ($num_imagenes >= 1 && file_exists($imagen['imagen1'])) {
			while($imagen = mysqli_fetch_array($album)) {
				unlink( '../' . $imagen['imagen1'] );
				unlink( '../' . $imagen['imagen2'] );
				unlink( '../' . $imagen['imagen3'] );
			}

			for ($i = 0; $i < $num_imagenes; $i++) {
				$borrar_imagenes = "DELETE FROM imagenes_albums WHERE album_id = {$id} LIMIT 1";
				$resultado_borrar_imagenes = mysqli_query($connection, $borrar_imagenes);
			}

			header("Location: ../albumes.php");
		}
	}

	function borrarContenido($id, $tabla, $seccion) {
		global $connection;

		$borrado1 = "DELETE FROM $tabla WHERE id = {$id} LIMIT 1";
		$result = mysqli_query($connection, $borrado1);

		if (mysqli_affected_rows($connection) == 1) {

			// ELIMINAR CONTENIDO EN INGLES
			$q_contenidos2 = "SELECT * FROM contenidos2 WHERE id = {$id} LIMIT 1";
			$r_contenidos2 = mysqli_query($connection, $q_contenidos2);

			if (mysqli_num_rows($r_contenidos2) == 0){
				header("Location: ../editar-seccion.php?seccion=" . $seccion);
			} else {
				$q_borrado2 = "DELETE FROM contenidos2 WHERE id = {$id} LIMIT 1";
				$r_borrado2  = mysqli_query($connection, $q_borrado2);
			}

			if ($tabla == 'albumes') {
				header("Location: ../albumes.php");
			} else {
				header("Location: ../editar-seccion.php?seccion=" . $seccion);
			}
		}
	}

	if (isset($_POST['eliminar'])) {
		$id      = $_POST['id'];
		$tabla   = $_POST['tabla'];
		$seccion = $_POST['seccion'];
		$imagenprincipal = $_POST['imagenprincipal'];

		if (!empty($imagenprincipal)) {
			borrarImagenPrincipal($imagenprincipal);
		}

		if ($tabla == 'albumes') {
			borrarImagenesAlbum($id);
		}

		borrarContenido($id, $tabla, $seccion);
	}
?>
