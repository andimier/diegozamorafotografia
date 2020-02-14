<?php
	require_once('includes/session.php');
	require_once('includes/connection.php');
	require_once('includes/functions.php');
	encontrar_seccion_y_contenido_seleccionados();
?>

<html>
	<head>
		<?php require_once('includes/tags.php'); ?>
	</head>

	<body>
		<div id="cnt_edicion">
			<div id="col2">
				<h3>
					Hola!
					<br>
					Para editar las secciones utiliza el menú ubicado a la izquierda.<br>
					Haz click en el título de alguna de las secciones.
				</h3>
			</div>
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
