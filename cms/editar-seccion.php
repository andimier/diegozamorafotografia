<?php
	require_once("includes/sesion.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	$mensaje = "";

	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");

	$imagen1 = '';
	$imagen2 = '';
	$imagen3 = '';

	require_once('edicion/insertar_contenidos.php');
	require_once('edicion/edc_imagenes/img_cambio.php');

	encontrar_seccion_y_contenido_seleccionados();

	$seccion_id = mysql_prep($_GET['seccion']);

	if( $seccion_id == 1 ){
		$q_contenido = "SELECT * FROM contenidos WHERE seccion_id = {$seccion_id} AND contenido_id = 0 ORDER BY indice DESC";
	}else if( $seccion_id == 8){
		$q_contenido = "SELECT * FROM contenidos WHERE seccion_id = {$seccion_id} AND contenido_id = 0 ORDER BY fecha DESC";
	}else{
		$q_contenido = "SELECT * FROM contenidos WHERE seccion_id = {$seccion_id} AND contenido_id = 0 ORDER BY id ASC";
	}

	$contenidos = mysqli_query($connection, $q_contenido);
	confirm_query($contenidos);


	// PARAMETROS FORMULARIO ACTUALIZACION DE CONTENIDOS
	$tabla   = "secciones";
	$seccion = $seccion_seleccionada['id'];
	$imagenprincipal = $seccion_seleccionada['imagen1'];
	$img = $seccion_seleccionada['imagen2'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="col2">
			<div id="cnt_edicion">

				<h3><?php echo $seccion_seleccionada['titulo']; ?></h3>

				<!-- EDITAR METATAGS-->

				<div class="titulo-rojo">
					<a href="puente_metatags.php?seccion_id=<?php echo $seccion_seleccionada['id']; ?>&sec=<?php echo $seccion_seleccionada['titulo']; ?>">
						> Editar Meta Tags de esta Sección
					</a>
				</div>
				<br />

				<!-- INSERTAR CONTENIDO -->
				<?php


				if ($seccion > 2 && $seccion < 6 || $seccion == 8 ): ?>
					<h4>Insertar nuevo contenido</h4>

					Nuevo Titulo:
					<form enctype="multipart/form-data" method="post">
						<input type="hidden" name="tabla"        value="imagenes_publicaciones" />
						<input type="hidden" name="seccion_id"   value="<?php echo $seccion_seleccionada['id'];?>" />
						<input type="text"   name="titulo"       value="" class="letra_azul borde_puntos" size="50" maxlength="50" />
						<br />
						<input type="submit" name="insertar_contenido" id="insertar_contenido" class="fondo_azul" value="insertar contenido"/>
					</form>

					<br />
					<br />

				<?php else: ?>

				<?php endif; ?>

				<div class="mensaje">
					<?php echo $mensaje . '<br /><br /><br />'; ?>
				</div>

				<strong>Haz click sobre el titulo del contenido para editarlo.</strong>
				<br />
				<br />

				<ul>
					<?php while($contenido = mysqli_fetch_array($contenidos)): ?>

						<?php if( $contenido['indice'] == 0 ): ?>
							<li>
								<a href="editar-contenido.php?contenido_id=<?php echo urlencode($contenido['id']); ?>">
									<?php echo $contenido["titulo"]; ?>
								</a>
							</li>
						<?php else: ?>
							<li>
								<a href="editar-subcontenido.php?contenido_id=<?php echo urlencode($contenido['id']); ?>&seccion_id=<?php echo $seccion_seleccionada['id'];?>">
									<?php echo $contenido["titulo"]; ?>
								</a>
							</li>
						<?php endif; ?>
					<?php endwhile; ?>
				</ul>
			</div>

			<!-- IMAGEN PRINCIPAL DEL CONTENIDO -->
			<?php
				if (!empty($imagenprincipal)) {
					echo '<div id="col3" >';
					echo '<h3>Imagen del Contenido</h3>';
					require_once('edicion/edc_imagenes/img_principal.php');
					echo '</div>';
				}
			?>
		</div>

		<div id="footer"></div>

		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>
	</body>
</html>

<?php
	if(isset($connection)){
		mysqli_close($connection);
	}
?>
