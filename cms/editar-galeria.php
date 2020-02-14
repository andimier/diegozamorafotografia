<?php
	require_once("includes/requeridos.php");

	$msj_nueva_imagen = "";
	$mensaje = "";

	require_once("edicion/edc_imagenes/imgbanners_insertar.php");
	require_once("edicion/edc_imagenes/imgbanners_guardar_eliminar.php");

	if (isset($_GET['album_id'])) {

		$album_id = $_GET['album_id'];
		$titulo = $_GET['album'];

		// ORDERNAR LAS IMAGENES POR ID O POSICION SI MUESTRAN LA CASILLA PARA CAMBIAR EL ORDEN
		if ($album_id < 2) {
			$orden = "posicion ASC";
		} else {
			$orden = "id DESC";
		}

		$imagenes = "SELECT * FROM imagenes_albums WHERE album_id = {$album_id} ORDER BY ". $orden;
		$album = mysqli_query($connection, $imagenes);

		$tabla = 'imagenes_albums';
		$campo = 'album_id';
		$campo_id = $album_id;
		$tema = 'tema';

	} else if (isset( $_GET['seccion_id'])) {
		$seccion_id = $_GET['seccion_id'];
		$titulo = 'Banner > ' . $_GET['nombre_seccion'];

		$imagenes = "SELECT * FROM imagenes_albums WHERE album_id = {$seccion_id} ORDER BY posicion ASC";
		$album = mysqli_query($connection, $imagenes);

		$tabla = 'imagenes_banners';
		$campo = 'seccion_id';
		$campo_id = $seccion_id;
		$tema = 'tema';
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="cnt_edicion">

			<div id="col2">
				<div class="imagenes">
					<h3>Album: <?php echo $titulo; ?></h3>

					<!-- INSERTAR IMAGEN -->
					<form enctype="multipart/form-data" method="post">
						<div class="">
							<input type="hidden" name="tabla"     value="<?php echo $tabla; ?>" />
							<input type="hidden" name="campo"     value="<?php echo $campo; ?>" />
							<input type="hidden" name="campo_id"  value="<?php echo $campo_id; ?>" />

							<div id="fileUpload">
								<input id="btn_foto" type="button" value="escoge una imagen" class="mascara">
								<input id="foto"  type="file" name="nombre_archivo"  class="upload" onchange="myFunction(this.value)" >
							</div>
						</div>

						<p id='nm_imagen'></p>
						<input id="bsubirimg" type="submit" name="insertar_imagen" value="" class="fondo_negro"/>
					</form>

					<script>
						function myFunction(val) {
							$("#nm_imagen").text(val);
							$("#bsubirimg").css('display', 'block');
						};
					</script>
					<br />
					<br />

					<div class="mensaje1"> <?php echo $msj_nueva_imagen; ?></div>
					<div class="mensaje"> <?php echo $mensaje; ?></div>

					<!-- TODAS LAS IMAGENES DEL ALBUM -->
					<form enctype="multipart/form-data" method="post" id="formulario_galeria">

						<input type="submit" name="btn_guardar" value="guardar cambios" class="btn_guardar fondo_verde" onclick="return confirm('Confirmas actualizar y/o borrar imagenes ');"/>

						<?php while($imagen = mysqli_fetch_array($album)): ?>
							<?php
								$explotarnombre = explode('/', $imagen['imagen1']);
								$nombrearchivo = $explotarnombre[2];

								// DAR ALTURA AL CNT DE LOS THUMBS PARA VER CASILLA DE POSICION SI ES LA SECCION QUE LOS REQUIERE
								if ($imagen['album_id'] < 2) {
									$altura = '280px';
									$display= 'block';
								} else {
									$altura = '225px';
									$display= 'none';
								}
							?>

							<div class="cnt_thumbs" style="height:<?php echo $altura; ?>">

								<div class="cnt_posicion" style="display:<?php echo $display; ?>">

									<input type="text" name="posicion[]" class="posicion"  value="<?php echo $imagen['posicion']; ?>" />
								</div>

								<select name="tema[]" id="escoger1" style="display:<?php echo $display; ?>">
									<option class="temas" value="retrato"    <?php echo $sel = ($imagen['tema']=='retrato')    ? $sel = 'selected': $sel =""; ?> >retrato</option>
									<option class="temas" value="documental" <?php echo $sel = ($imagen['tema']=='documental')     ? $sel = 'selected': $sel =""; ?> >documental</option>
									<option class="temas" value="urbano"     <?php echo $sel = ($imagen['tema']=='urbano')     ? $sel = 'selected': $sel =""; ?> >urbano</option>
									<option class="temas" value="personal" <?php echo $sel = ($imagen['tema']=='personal') ? $sel = 'selected': $sel =""; ?> >personal</option>
								</select>

								<div class="cnt_imagen">
									<img src="<?php echo $imagen['imagen1']; ?>"  />
									<div class="nombre_imagen"><?php echo $nombrearchivo; ?> </div>
								</div>

								<input type="hidden" name="tabla"      value="<?php echo $tabla; ?>" />
								<input type="hidden" name="id[]"       value="<?php echo $imagen['id'];?>" />

								<div class="check_eliminar">
								Eliminar
								<input type="checkbox" class="check" name="eliminar[]"  value="<?php echo $imagen['id'];?>" />
								</div>

							</div>
						<?php endwhile; ?>

						<br />

					</form>
				</div>
			</div>
		</div>

		<div id="footer"></div>

		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>

		<script src="js/general.js" type="text/javascript"></script>
	</body>
</html>

<?php
	if (isset($connection)) {
		mysqli_close($connection);
	}
?>