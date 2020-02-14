<?php
	if (isset($_POST['guardar'])) {
		$id = mysql_prep($_POST['id']);

		$palabras1     = mysql_prep($_POST['palabras1']);
		$descripcion1  = trim(mysql_prep($_POST['descripcion1']));

		$palabras2     = mysql_prep($_POST['palabras2']);
		$descripcion2  = trim(mysql_prep($_POST['descripcion2']));

		$query = "UPDATE metatags SET ";
		$query .= "palabras1 = '{$palabras1}', descripcion1 = '{$descripcion1}' ";
		$query .= "palabras2 = '{$palabras2}', descripcion2 = '{$descripcion2}' ";
		$query .= "WHERE id = {$id}";

		$result = mysqli_query($connection, $query);

		if (mysqli_affected_rows($connection) == 1) {
			$mensaje = "<br /><div class=\"mensaje1\"> El campo fue actualizado correctamente!</div><br />";
		} else {
			$mensaje = "<br /><div class=\"mensaje\">El campo NO fue actualizado. No hiciste ningún cambio.</div><br />".
			mysql_error();
		}
	}
?>

