<?php
	if ($tabla == 'contenidos'){
		$idioma = 0;
		$tag_titulo = 'PORTAFOLIO';
		$titulo_seccion = 'PORTAFOLIO';
		$seccion_url = 'portfolio.php';
		$ruta = '';
	} else {
		$idioma = 1;
		$tag_titulo = 'PORTFOLIO';
		$titulo_seccion = 'PORTFOLIO';
		$seccion_url = 'portafolio.php';
		$ruta = '../';
	}
?>

<!doctype html>
<html>
	<head>
		<?php include( $ruta .'requeridos/tags.php'); ?>
		<?php include( $ruta .'requeridos/tags-contacto.php'); ?>

		<link href="<?php echo $ruta; ?>css/portafolio.css" type="text/css" rel="stylesheet" media="screen"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $ruta; ?>css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ruta; ?>css/component.css" />
		<script src="<?php echo $ruta; ?>js/modernizr.custom.js"></script>

		<?php include( $ruta . 'requeridos/galeria.php'); ?>
	</head>

	<body>
		<?php
			if (file_exists( $ruta .'requeridos/header.php')) {
				include( $ruta .'requeridos/header.php');
			}
		?>

		<div class="camIcon">
			<img src="<?php echo $ruta; ?>img/cam3.png"/>
		</div>

		<div id="logo-acf">
			<img src="<?php echo $ruta; ?>img/logo-acf.png" alt="asociación colombiana de fotógrafos"/>
		</div>

		<div id="cnt_redes">
			<a href="<?php echo $enlace[0]; ?>" target="_blank" class="redes facebook"></a>
			<a href="<?php echo $enlace[1]; ?>" target="_blank" class="redes instagram"></a>
			<a href="<?php echo $enlace[2]; ?>" target="_blank" class="redes flickr"></a>
		</div>

		<br>
		<br>
		<div id="anclas">
			<h2>
				<?php
					for ($c=0;$c<count($categorias_arr);$c++) {
						echo '<a href="#'.$categorias_arr[$c][$idioma].'"> '.strtoupper($categorias_arr[$c][$idioma]).' </a>';
						echo ($c==count($categorias_arr)-1) ? '' : '/';
					}
				?>
			</h2>
		</div>

		<?php /*
			for ($i=0; $i<count($categorias_arr); $i++) {
				$q_imagenes = "SELECT * FROM imagenes_albums WHERE album_id = {$album} AND tema = '{$categorias_arr[$i][0]}' ORDER BY posicion";
				$r_imagenes = mysqli_query($connection, $q_imagenes);

				if (mysqli_num_rows($r_imagenes) > 0) {
					$element = '<div class="cnt_categorias">';
					$element .= '<div class="category-title"><h2 id="'.$categorias_arr[$i][$idioma].'">' . $categorias_arr[$i][$idioma] . '</h2></div>';

                    while($imagen = mysqli_fetch_array($r_imagenes)){
						$element .= '<div class="image-container">';
						$element .= '<a class="fancybox" href="'.$ruta . 'cms/' . $imagen['imagen3'] . '" data-fancybox-group="gallery" title="' . $imagen['exif_data'] . '" >';
						$element .= '<img src="'.$ruta. 'cms/' . $imagen['imagen3'].'"/>';
						$element .= '</a>';
						$element .= '</div>';
					}

					$element .= '</div>';

                    echo $element;
				}
			}*/
		?>

        <?php
			for ($i=0;$i<count($categorias_arr);$i++) {
				$q_imagenes = "SELECT * FROM imagenes_albums WHERE album_id = {$album} AND tema = '{$categorias_arr[$i][0]}' ORDER BY posicion";
				$r_imagenes = mysqli_query($connection, $q_imagenes);

				if (mysqli_num_rows($r_imagenes) > 0) {
					$categoryGallery = '<div class="cnt_categorias">';
					$categoryGallery .= '<h2 id="'.$categorias_arr[$i][$idioma].'">' . $categorias_arr[$i][$idioma] . '</h2>';
                    $categoryGallery .= '<div class="gota2"></div>';
					$categoryGallery .= '<div class="grid">';

					while($imagen = mysqli_fetch_array($r_imagenes)){
						$categoryGallery .= '<div class="grid-item">';
						$categoryGallery .= '<a class="fancybox" href="'.$ruta . 'cms/' . $imagen['imagen3'] . '" data-fancybox-group="gallery" title="' . $imagen['exif_data'] . '" >';
						$categoryGallery .= '<img src="'.$ruta. 'cms/' . $imagen['imagen3'].'"/>';
						$categoryGallery .= '</a>';
						$categoryGallery .= '</div>';
					}

					$categoryGallery .= '</div>';
					$categoryGallery .= '</div>';

                    echo $categoryGallery;
				}
			}
		?>

        <div id="images-container"></div>

		<script src="<?php echo $ruta; ?>js/masonry.pkgd.min.js"></script>
		<script src="<?php echo $ruta; ?>js/imagesloaded.js"></script>
		<script src="<?php echo $ruta; ?>js/classie.js"></script>
		<!--<script src="<?php echo $ruta; ?>js/AnimOnScroll.js"></script>-->

		<script src="<?php echo $ruta; ?>js/grid.js"   type="text/javascript"></script>
        <!--<script src="<?php echo $ruta; ?>js/galeria.js"   type="text/javascript"></script>-->
		<?php include( $ruta . 'requeridos/menu.php'); ?>
		<script src="<?php echo $ruta; ?>js/header.js"   type="text/javascript"></script>

		<?php include( $ruta . 'requeridos/contacto.php'); ?>
		<script src="<?php echo $ruta; ?>js/contacto.js" type="text/javascript"></script>

		<?php include( $ruta . 'requeridos/footer.php'); ?>
	</body>
</html>