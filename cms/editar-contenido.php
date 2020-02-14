<?php
	require_once("includes/requeridos.php");

	$mensaje = "";
	$mensaje2 = "";
	$imagen = "";

	if( intval( $_GET['contenido_id'] ) == 0){
		header("Location: content.php");
		exit;
	}

	require_once('edicion/edc_imagenes/img_cambio.php');
	require_once("edicion/actualizaciondecontenidos.php");

	// ACTUALIZACION DEL ALBUM VISIBLE DEL FOTOGRAFO
	if (isset($_POST['btn_veralbumes'])) {
		$album_id = $_POST['visible'];
		$kontenido_id = $_POST['kontenido_id'];

		$q_visible1 = "UPDATE albumes SET visible = CASE id	WHEN {$album_id} THEN 1 END WHERE contenido_id = {$kontenido_id}";

		$r_visible1 = mysql_query($q_visible1, $connection);

		if ($r_visible1) {
			//echo 'SIIIII';
		} else {
			mysql_error();
		}
	}

	// poner luego de la actualizaciondecontenidos para ver los cambios
	encontrar_seccion_y_contenido_seleccionados();

	// PARAMETROS ACTUALIZACION Y ELIMINACION DE CONTENIDOS
	require_once("edicion/parametros_actualizacion.php");

	$tituloboton = "Eliminar";
	$archivo_eliminar = 'edicion/eliminar-contenidos.php';

	// ACTUALIZACION DEL ALBUM VISIBLE DEL FOTOGRAFO

	$filas ="";

	if($seccion == 3){
		$q_albumes = "SELECT * FROM albumes WHERE contenido_id = {$contenido_seleccionado['id']} ";
		$r_albumes = mysqli_query($connection, $q_albumes);

		if (mysqli_num_rows($r_albumes) > 0) {
			$filas = 1;
		} else {
			$filas = 0;
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="col2">

			<div id="cnt_edicion">
				<a href="editar-seccion.php?seccion=<?php echo $contenido_seleccionado['seccion_id']; ?>">Volver a la Sección</a>
				<br>
				<br>

				Editar Contenido: <?php echo $contenido_seleccionado['titulo'] . ' / ' . $fecha; ?>
				<br />
				<br />

				<?php echo $mensaje; ?>

				<?php if (empty($imagenprincipal) || $contenido_seleccionado['seccion_id'] == 4): ?>

				<?php else: ?>
					<div id="col3" >

						<?php require_once('edicion/edc_imagenes/img_principal.php'); ?>
					</div>
				<?php endif; ?>

				<!-- BOTONES IMAGEN E IDIOMA + -->
				<div id="cnt_botones">
					<?php if ($seccion == 3 && $filas == 1 ): ?>
						<div class="botones fondo_verde espacio_derecha"  >
							<a href="#cnt_albumesconteido">
								Editar Albumes
							</a>
						</div>
					<?php endif; ?>

					<div class="botones fondo_gris2"  >
						<a href="puente.php?contenido_id=<?php echo $id; ?>&seccion=<?php echo $seccion; ?>&indice=<?php echo $indice; ?>">
							Editar Ingles
						</a>
					</div>
				</div>

				<div id="formulario">
					<?php require_once("edicion/formularioedicion1.php"); ?>
				</div>

				<?php if( $seccion == 3): ?>

					<?php if( $filas > 0 ): ?>
						<div id="cnt_albumesconteido">
							<br />
							<br />

							Seleciona el álbum que quieres que aparezca en la sección de este fotografo.
							<br />
							<br />

							<form enctype="multipart/form-data" method="post">

								<input type="hidden" name="kontenido_id" value="<?php echo $contenido_seleccionado['id']; ?>" />

								<?php while ($album = mysqli_fetch_array($r_albumes)):?>
									<div class="albumcontenido">
										<input type="radio" name="visible" value="<?php echo $album['id']; ?>"
											<?php
											if($album['visible']==1){
												echo 'checked';
											}
											?>
										/><?php echo $album['titulo']; ?>
									</div>
								<?php endwhile; ?>
								<br />

								<input type="submit" name="btn_veralbumes" class="boton1" value="Guardar" />
							</form>
						</div>
					<?php endif; ?>
				<?php endif;?>

				<!--  FORMULARIO ELIMINAR DEL CONTENIDO -->
				<?php
					if ($borrable == 1) {
						echo '<div id="col4" >';
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
