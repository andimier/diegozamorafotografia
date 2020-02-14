<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	$mensaje = "";
	$mensaje2 = "";
	$imagen = "";

	require_once('edicion/edc_imagenes/img_cambio.php');
	require_once("edicion/actualizaciondecontenidos.php");

	if (isset( $_GET['album_id'])) {
		$album_id = $_GET['album_id'];
		$album_seleccionado = traer_album_por_id($album_id);
	} else {
		header("Location: inicio.php");
		exit;
	}

	function traer_album_por_id($album_id) {
		global $connection;
		$query = "SELECT * FROM albumes WHERE id =" . $album_id . " LIMIT 1";

		$result_set = mysqli_query($connection, $query);
		confirm_query($result_set);

		if ($album = mysqli_fetch_array($result_set)) {
			return $album;
		} else {
			return NULL;
		}
	}

	// SELECIONAR  TODOS LOS FOTOGRAFOS PARA PODERLES ASIGNAR UN ALBUM
	$q_contenido = "SELECT * FROM contenidos WHERE seccion_id = 3";
	$r_contenido = mysqli_query($connection, $q_contenido);

	// SELECCIONAR AL FOTOGRAFO AL QUE ESTÁ ASIGNADO EL ALBUM
	if ($album_seleccionado['contenido_id'] > 0) {
		$q_fotografo = "SELECT * FROM contenidos WHERE id = " . $album_seleccionado['contenido_id'];
		$r_fotografo = mysqli_query($connection, $q_fotografo);

		if(mysqli_num_rows($r_fotografo) > 0){
			while($fotografo = mysqli_fetch_array($r_fotografo)){
				$quien = $fotografo['titulo'];
			}
		}else{
			$quien = "aun no hay fotografo asignado a este album";
		}
	}else{
		$quien = "aun no hay fotografo asignado a este album";
	}

	// PARAMETROS ACTUALIZACION Y ELIMINACION DE CONTENIDOS
	require_once("edicion/parametros_actualizacion.php");

	$tituloboton = "Eliminar";
	$archivo_eliminar = 'edicion/eliminar-contenidos.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="col2">
			<div id="cnt_edicion">
				Editar Contenido: <?php echo $album_seleccionado['titulo'] . ' / ' . $fecha; ?>
				<br />
				<br />

				<div class="mensaje" style="color:#F00"> <?php echo $mensaje; ?></div>

				<!-- IMAGEN PRINCIPAL DEL CONTENIDO -->
				<?php
					if(!empty($imagenprincipal)){
						echo '<div id="col3" >';
						require_once('edicion/edc_imagenes/img_principal.php');
						echo '</div>';
					}
				?>

				<!-- FORMULARIO DE EDICION DE CONTENIDOS -->
				<div style="clear:both">
					<?php require_once("edicion/formularioedicion1.php"); ?>
				</div>

				<div id="imagenes_album">
					<a href="editar-galeria.php?album_id=<?php echo $album_seleccionado['id']; ?>&album=<?php echo $album_seleccionado['titulo']; ?>">
						Editar Imágenes en este álbum
					</a>
				</div>

				<!-- FORMULARIO ELIMINAR DEL CONTENIDO -->
				<?php
					if ($album_seleccionado['borrable'] == 1) {
						echo '<div id="col4">';
						require_once("edicion/formularioeliminar1.php");
						echo '</div>';
					}
				?>
			</div>
		</div>
		<div id="footer"></div>

		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>
	</body>
</html>

<?php
	if (isset($connection)) {
		mysqli_close($connection);
	}
?>
