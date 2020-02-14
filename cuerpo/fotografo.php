<?php
	if (isset($_GET['fotografo'])) {
		$explode = explode('=', $_GET['fotografo']);
		$idf = $explode[0];
	} else if (isset($_GET['photographer'])) {
		$explode = explode('=', $_GET['photographer']);
		$idf = $explode[0];
	}

	if ($tabla == 'contenidos') {
		$tag_titulo  =  'Fotógrafo, Diego Zamora Fotografía';
		$titulo_seccion= 'FOTÓGRAFO';
		$seccion_url = 'photographer.php?photographer=' . $idf;
		$ruta = '';
	} else {
		$tag_titulo  =  'Photgraphers, Diego Zamora Photography';
		$titulo_seccion= 'PHOTOGRAPHERS';
		$seccion_url = 'fotografo.php?fotografo=' . $idf;
		$ruta = '../';
	}
?>

<!doctype html>
<html>
	<head>
		<?php include( $ruta . 'requeridos/tags.php'); ?>

		<link href="<?php echo $ruta; ?>css/detalle-fotografo.css" type="text/css" rel="stylesheet" media="screen"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="<?php echo $ruta; ?>css/detalle-fotografo-pq.css" />
		<?php include( $ruta . 'requeridos/tags-contacto.php'); ?>
		<?php include( $ruta . 'requeridos/galeria.php'); ?>

		<link rel="stylesheet" type="text/css" href="<?php echo $ruta; ?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ruta; ?>css/component.css" />
		<script src="<?php echo $ruta; ?>js/modernizr.custom.js"></script>
	</head>

	<body>
		<?php include( $ruta . 'requeridos/header.php'); ?>

		<div class="camIcon"><img src="<?php echo $ruta; ?>img/cam2.png"/></div>

		<div id="cnt_info">

			<div class="info">

				<div id="imagen">
					<img class="imgFull" src="<?php echo $ruta; ?>cms/<?php echo $imagen; ?>"/>
				</div>
			</div>

			<div class="info">
				<h3>Bio</h3>
				<div id="texto" >
					<p><?php echo $bio; ?></p>
				</div><!-- fin fotografoText -->
			</div>
		</div>

		<script>
			var fotografo = document.getElementById('imagen'),
				tabla = '<?php echo $tabla; ?>',
				msk;

			// PONER MASCARA
			msk = document.createElement('img');

			if (tabla == 'contenidos') {
				msk.setAttribute('src', 'img/mascara1.png');
			} else {
				msk.setAttribute('src', '../img/mascara1.png');
			}

			msk.style.position = 'absolute';
			msk.style.top = 0;
			msk.style.left = 0;
			msk.style.width = '100%';

			msk.className = 'mascara';

			fotografo.appendChild(msk);
		</script>

		<div id="portafolio">
			<?php if($r_imagenes): ?>

				<h1 class="f1">Portafolio</h1>

				<div class="container">
					<ul class="grid effect-1" id="grid">
						<?php while( $imagen = mysqli_fetch_array($r_imagenes)): ?>
							<li>
								<a class="fancybox" href="<?php echo $ruta; ?>cms/<?php echo $imagen['imagen3']; ?>" data-fancybox-group="gallery" title="<?php echo $imagen['exif_data']; ?>" >
									<img src="<?php echo $ruta; ?>cms/<?php echo $imagen['imagen3']; ?>">
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif;?>

			</div>

			<script src="<?php echo $ruta; ?>js/masonry.pkgd.min.js"></script>
			<script src="<?php echo $ruta; ?>js/imagesloaded.js"></script>
			<script src="<?php echo $ruta; ?>js/classie.js"></script>
			<script src="<?php echo $ruta; ?>js/AnimOnScroll.js"></script>

			<script>
				new AnimOnScroll( document.getElementById( 'grid' ), {
					minDuration : 0.4,
					maxDuration : 0.7,
					viewportFactor : 0.2
				} );
			</script>

		</div>

		<?php include( $ruta . 'requeridos/contacto.php'); ?>
		<?php include( $ruta . 'requeridos/menu.php'); ?>
		<script src="<?php echo $ruta; ?>js/header.js" type="text/javascript"></script>
		<script src="<?php echo $ruta; ?>js/contacto.js" type="text/javascript"></script>
		<?php include( $ruta . 'requeridos/footer.php'); ?>
	</body>
</html>