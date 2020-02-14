<?php
	require_once("includes/sesion.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	if (isset($_GET['contenido_id'])) {

		$id = $_GET['contenido_id'];
		$seccion = $_GET['seccion'];
		$indice = $_GET['indice'];

		$titulo = "Test tittle";
		$contenido = "content";

		$busqueda = "SELECT id FROM contenidos2 WHERE id = {$id}";
		$resultado = mysqli_query($connection, $busqueda);

		if (mysql_num_rows($resultado) >= 1) {
			header('Location: editar-contenido2.php?contenido_id='. $id);
			exit;
		} else {
			$creacion = "INSERT INTO contenidos2 (id, seccion_id, titulo, contenido, indice) ";
			$creacion .= "VALUES ('{$id}', '{$seccion}', '{$titulo}', '{$contenido}', '{$indice}')";

			$crear = mysql_query($creacion, $connection);

			if (mysqli_affected_rows($connection) > 0){
				header('Location: editar-contenido2.php?contenido_id='. $id);
			} else {
				echo "No se creo nada - " . mysql_error();
			}
		}
	}
?>