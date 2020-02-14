<?php
	if ($tabla == 'contenidos') {
		$tag_titulo  =  'Diego Zamora, Fotografía';
		$titulo_seccion= 'FOTOGRAFÍA';
		$seccion_url = '';
		$ruta = '';
	} else {
		$tag_titulo  =  'Diego Zamora, Fotografía';
		$titulo_seccion= 'FOTOGRAPHY';
		$seccion_url = '';
		$ruta = '../';
	}
?>

<!doctype html>
<html>
	<head>
		<?php include( $ruta.'requeridos/tags.php'); ?>

		<link href="<?php echo $ruta; ?>css/inicio.css" type="text/css" rel="stylesheet" media="screen"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:800px)" href="<?php echo $ruta; ?>css/inicio-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="<?php echo $ruta; ?>css/inicio-pq.css" />

		<?php include( $ruta . 'requeridos/tags-contacto.php'); ?>
	</head>

	<body>
		<?php require_once( $ruta .'requeridos/header1.php'); ?>

		<div id="centro">

			<div id="logo"></div>

			<div class="tt_principal1">
				<h2><?php echo $titulo_seccion; ?></h2>
			</div>

			<div class="camara"></div>

			<div class="gota"></div>

			<div id="btn_diego" class="equipoBtn"></div>
			<div id="logo-acf"><img src="<?php echo $ruta; ?>img/logo-acf.png" alt="asociación colombiana de fotógrafos"/></div>

			<div id="cnt_redes">
				<a href="<?php echo $enlace[0]; ?>" target="_blank" class="redes facebook"></a>
				<a href="<?php echo $enlace[1]; ?>" target="_blank" class="redes instagram"></a>
				<a href="<?php echo $enlace[2]; ?>" target="_blank" class="redes flickr"></a>
			</div>

			<div id="andimier-inicio">
				<a href ="http://www.andimier.com" target="_blank">
					<div id="logo-andimier">
						<img  src="http://www.andimier.com/imagenes/web-logo-clientes-gris.png" alt="andimier.com, diseño gráfico y web" />
					</div>
				</a>
			</div>
		</div>

		<div id="cnt_equipo">
			<div id="equipo" class="section">
				<div id="equipoBtnContainer">
			</div>

			<?php include($ruta .'requeridos/equipo.php'); ?>
		</div>

		<?php include($ruta.'requeridos/menu.php'); ?>
		<script src="<?php echo $ruta; ?>js/header1.js"   type="text/javascript"></script>

		<?php //include($ruta.'requeridos/contacto.php'); ?>
		<script src="<?php echo $ruta; ?>js/contacto.js" type="text/javascript"></script>

		<script src="<?php echo $ruta; ?>js/home.js"     type="text/javascript"></script>
	</body>
</html>
<?php
	mysqli_close($connection);
?>