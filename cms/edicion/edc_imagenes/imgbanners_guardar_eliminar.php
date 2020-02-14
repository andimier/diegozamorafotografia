<?php
	if (isset($_POST['btn_guardar'])) {

		if( isset($_POST['posicion'])) {

			for($i=0; $i < count($_POST['posicion']); $i++){
				$tema[] = $_POST['tema'][$i];

				$query = "UPDATE imagenes_albums ";
				$query .= "SET posicion = " . $_POST['posicion'][$i] . ", tema = '{$tema[$i]}'";
				$query  .= "WHERE id = ". $_POST['id'][$i];

				$resultado = mysqli_query($connection, $query);
			}
		}

		if (isset($_POST['eliminar'])) {

			for ($e=0; $e < count($_POST['eliminar']); $e++) {
				$query_g2 = "SELECT * FROM imagenes_albums WHERE id = " . $_POST['eliminar'][$e];

				$result = mysqli_query($connection, $query_g2);
				$imagen = mysqli_fetch_array($result);

				$nombre1 =  $imagen['imagen1'];
				$nombre2 =  $imagen['imagen2'];
				$nombre3 =  $imagen['imagen3'];

				if(unlink($nombre1)){
					unlink($nombre2);
					unlink($nombre3);

					$queryborrado = "DELETE FROM imagenes_albums WHERE id = " . $_POST['eliminar'][$e];
					$result2 = mysqli_query($connection, $queryborrado);

					if (mysqli_affected_rows($connection) == 1){
						//$mensaje = "La imagen se ha borrado";
					} else {
						//$mensaje = "No se ha podido eliminar la imagen";
						//echo mysql_error();
					}
				}
			}
		}
		//$mensaje = 'Cambios guardados!';
	} else {
		//$mensaje = 'No se han hecho cambios';
	}
?>
