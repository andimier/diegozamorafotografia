<?php
	require_once("includes/requeridos.php");

	$mensaje = "";
	$palabras = "";
	$descripcion = "";

	if (!isset($_GET['seccion_id'])) {
		header("Location: content.php");
		exit;
	} else {
		$seccion_id = $_GET['seccion_id'];
		$seccion = $_GET['sec'];

		require_once("edicion/act-metatags.php");

		$query = "SELECT * FROM metatags WHERE seccion_id = " . $seccion_id;
		$result = mysqli_query($connection, $query);

		while ($datos = mysqli_fetch_array($result)) {
			$id = $datos['id'];

			$palabras1 = $datos['palabras1'];
			$descripcion1 = $datos['descripcion1'];

			$palabras2 = $datos['palabras2'];
			$descripcion2 = $datos['descripcion2'];
		}
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="col2">
			<div id="cnt_edicion">

				<h3><?php echo $seccion; ?></h3>

				<?php echo $mensaje; ?>

				<form enctype="multipart/form-data" name="form_metatags" id="form_metatags" method="post">
					<br />
					<br />

					<input type="hidden" name="id" value="<?php echo $id; ?>">

					<!-- ESPAÑOL -->
					<label>Palabras Clave</label>
					<br />
					<br />

					<textarea name="palabras1" id="areadeficha" cols="70" rows="7"><?php echo $palabras1; ?></textarea>
					<br />
					<br />

					<label>Descripción</label>
					<br />
					<br />
					
					<textarea name="descripcion1" id="areadeficha" cols="70" rows="7"><?php echo $descripcion1; ?></textarea>
					<br />
					<br />

					<!-- INGLÉS -->
					<div class="mensaje"> < INGLÉS ></div>
					<br />
					
					<label>Key Words
					<br />
					<br />
					
					<textarea name="palabras2" id="areadeficha" cols="70" rows="7"><?php echo $palabras2; ?></textarea>
					<br />
					<br />

					<label>Description
					<br />
					<br />
					
					<textarea name="descripcion2" id="areadeficha" cols="70" rows="7"><?php echo $descripcion2; ?></textarea>
					
					</label>
					<br />
					<br />

					<input type="submit" name="guardar" class="boton1" value="Guardar" />
				</form>
			</div>
		</div>

		<div id="footer"></div>

		<?php include_once('includes/cabezote.php'); ?>
		<?php include_once('includes/navegacion.php'); ?>
	</body>
</html>
