<?php
	require_once("includes/sesion.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	$mensaje = "";
	$mensaje2 = "";

	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");

	// INSERCION NUEVO ALBUM
	if (isset($_POST['insertar_album'])) {
		$titulo = $_POST['titulo'];
		$borrable = 1;

		$errores = array();
		$required_fields = array('titulo');

		$imagen_provisional1 = "imagenes/pequenas/photo.png";
		$imagen_provisional2 = "imagenes/medianas/photo.png";
		$imagen_provisional3 = "imagenes/grandes/photo.png";

		foreach($required_fields as $fieldname){
			if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))) {
				$errores[] = $fieldname;
			}
		}

		if (empty($errores)) {
			// CREACION DEL CONTENIDO
			$query = "INSERT INTO albumes (fecha, titulo, borrable, imagen1, imagen2, imagen3) ";
			$query .= "VALUES ('{$fecha}', '{$titulo}', '{$borrable}', '{$imagen_provisional1}', '{$imagen_provisional2}', '{$imagen_provisional3}')";

			$result = mysqli_query($connection, $query);

			if (mysqli_affected_rows($connection) >= 1) {
				$mensaje = "";
				$mensaje2 = "Contenido creado correctamente ";
			} else {
				echo mysql_error();
				echo "No se creo nada";
			}
		}else{
			$mensaje = "";
			$mensaje2 = "Debes ingresar un titulo!!";
		}
	}

	require_once('edicion/edc_imagenes/img_cambio.php');

	encontrar_seccion_y_contenido_seleccionados();

	// FILTRO DE LA BUSQUEDA DE LOS ALBUMES
	if (isset( $_GET['fecha'])) {
		$q_albumes = "SELECT * FROM albumes ORDER BY fecha DESC";
		$filtro = 'fecha';
	} else if (isset( $_GET['fotografo'] )) {
		$q_albumes = "SELECT * FROM albumes ORDER BY contenido_id DESC";
		$filtro = 'fotografos';
	} else {
		$q_albumes = "SELECT * FROM albumes ORDER BY fecha DESC";
		$filtro = 'fecha';
	}

	$r_albumes = mysqli_query($connection, $q_albumes);

	// VERIFICAR SI CANSULTA NO ESTÁ VACIA

	if (mysqli_num_rows($r_albumes) != 0){
		$mensaje = "";
	} else {
		$mensaje = "Parece que no hay álbumes asociados a " . $filtro;
	}

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
				<h3>Álbumes</h3>

				<div id="formularioedicion1">

					<h4>Insertar nuevo Álbum</h4>

					Nuevo Titulo:
					<form enctype="multipart/form-data" method="post">
						<input type="hidden" name="tabla"   value="albumes" />
						<input class="borde_puntos letra_azul" type="text"   name="titulo"  value="" size="50" maxlength="50"/>
						<br />

						<input type="submit" name="insertar_album" class="insertar_contenido fondo_negro" value="insertar Álbum"/>
					</form>
					<br />

					<div class="mensaje"><?php echo $mensaje2 . '<br /><br />'; ?></div>

					<!-- FILTROS -->
					<div id="cnt_filtros">

						Filtrar por:
						<br>
						<br>

						<a class="btn_filtro filtro2 fondo_gris2" href='albumes.php?fecha=1'>fecha</a>
						<a class="btn_filtro filtro3 fondo_gris2" href='albumes.php?fotografo=1'>fotografo</a>
					</div>

					<div class="mensaje"><?php echo $mensaje . '<br /><br />'; ?></div>
					<br>
					<br>

					<strong>Haz click sobre el titulo del álbum para editarlo.</strong>
					<ul>
						<?php while($album = mysqli_fetch_array($r_albumes)): ?>
							<li>
								<a href="editar-album.php?album_id=<?php echo urlencode($album['id']); ?>">
									<?php echo $album["titulo"] .'  /  '.
									$fil = ($filtro == 'fotografos') ? $fil = $album["contenido_titulo"] : $fil = $album["fecha"]; ?>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
					<br />

				</div>
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
