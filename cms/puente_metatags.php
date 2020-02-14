<?php
	require_once("includes/sesion.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	if (isset($_GET['seccion_id'])) {
		$seccion_id = $_GET['seccion_id'];
		$seccion = $_GET['sec'];

		$palabras1 = "Cambia este texto";
		$descripcion1 = "Cambia este texto";

		$busqueda = "SELECT id FROM metatags WHERE seccion_id = " . $seccion_id;
		$resultado = mysqli_query($connection, $busqueda);

		if (mysqli_num_rows($resultado) > 0) {
			header('Location: editar-metatags.php?seccion_id='. $seccion_id . '&sec=' . $seccion);
			exit;
		} else {
			$creacion = "INSERT INTO metatags (seccion_id, palabras1, descripcion1) ";
			$creacion .= "VALUES ('{$seccion_id}', '{$palabras1}', '{$descripcion1}')";

			$crear = mysqli_query($connection, $creacion);

			if (mysqli_affected_rows($connection) > 0) {
				header('Location: editar-metatags.php?seccion_id='. $seccion_id . '&sec=' . $seccion);
			} else {
				echo "No se creo nada - " . mysql_error();
			}
		}
	}
?>