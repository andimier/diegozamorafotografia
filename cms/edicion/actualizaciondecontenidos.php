<?php
	// ACTUALIZACION DE LOS CONTENIDOS
	if (isset($_POST['boton1'])) {
		$tabla = $_POST['tabla'];

		if ($tabla == 'albumes') {

			$id     = mysql_prep($_POST['id']);
			$fecha  = mysql_prep($_POST['fecha']);
			$titulo = trim(mysql_prep($_POST['titulo']));

			// ESTE ES EL PARAMETRO DEL SELECT PARA ASIGNARLE UN ALBUM AL FOTOGRAFO
			$contenido_id =  $_POST['contenido_id'];

			$q_ttcontenido ="SELECT titulo FROM contenidos WHERE id = {$contenido_id} LIMIT 1";
			$r_ttcontenido = mysqli_query($connection, $q_ttcontenido);
			$dato = mysqli_fetch_assoc($r_ttcontenido);

			$titulo_contenido = $dato['titulo'];

			$query  = "UPDATE $tabla ";
			$query .= "SET titulo = '{$titulo}', fecha = '{$fecha}', contenido_id = {$contenido_id}, contenido_titulo = '{$titulo_contenido}' , visible = 0 ";
			$query .= "WHERE id = {$id}";
		} else {
			$id = mysql_prep($_POST['id']);
			$fecha = mysql_prep($_POST['fecha']);
			$titulo = trim(mysql_prep($_POST['titulo']));

			// SI EL CONTENIDO NO TIENE TEXTO
			if (isset($_POST['areadetexto'])) {
				$contenido = mysql_prep($_POST['areadetexto']);
			} else {
				$contenido = "";
			}

			$query = "UPDATE $tabla ";
			$query .= "SET  titulo = '{$titulo}', fecha = '{$fecha}', contenido = '{$contenido}' ";
			$query .= "WHERE id = {$id}";
		}

		$result = mysqli_query($connection, $query);

		if(mysqli_affected_rows($connection) == 1){
			$mensaje = '<div id="mensaje_positivo">La Sección fue actualizada correctamente! </div>';
		}else{
			$mensaje = '<div id="mensaje_negativo">La Sección no fue actualizada. No hiciste ningún cambio. </div>';
			echo "Nada". mysqli_error($connection);
		}
	}
?>
