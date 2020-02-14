<?php
	if( $tabla == 'contenidos' ){
		$tag_titulo  =  'Fotógrafos, Diego Zamora Fotografía';
		$titulo_seccion= 'FOTÓGRAFOS';
		$seccion_url = 'photographers.php';
		$ruta = '';
		$ruta_fotografo = 'fotografo.php?fotografo=';
		$tt_portafolio = 'Portafolio';
	}else{
		$tag_titulo  =  'Photgraphers, Diego Zamora Photography';
		$titulo_seccion= 'PHOTOGRAPHERS';
		$seccion_url = 'fotografos.php';
		$ruta = '../';
		$ruta_fotografo = 'english/photographer.php?photographer=';
		$tt_portafolio = 'Portfolio';
	}
?>

<!doctype html>
<html>
	<head>
		<?php include( $ruta . 'requeridos/tags.php'); ?>
		<link rel="stylesheet" type="text/css"  media="screen"href="<?php echo $ruta; ?>css/fotografos.css"  />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:800px)" href="<?php echo $ruta; ?>css/fotografos-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="<?php echo $ruta; ?>css/fotografos-pq.css" />
		<?php include( $ruta . 'requeridos/tags-contacto.php'); ?>
	</head>

	<body>
		<?php include( $ruta . 'requeridos/header.php');?>

		<div class="camIcon"><img src="<?php echo $ruta; ?>img/cam2.png"/></div>

		<div class="fotografos">
			<?php while ($fotografo = mysqli_fetch_array($r_contenidos)): ?>
				<div class="fotografo">
					<a href="<?php echo $ruta . $ruta_fotografo . $fotografo['id']; ?>">
						<div class="fotografoContent">
							<div class="fotografoImagen">
								<img class="imgFotografo" src="<?php echo $ruta; ?>cms/<?php echo $fotografo['imagen2']; ?>" />
								<img class="circulo" src="<?php echo $ruta; ?>img/circle.png" />
								<img class="marcarafoto" src="<?php echo $ruta; ?>img/mascara3.png" />

								<h3 class="fWhite">
									<?php echo $fotografo['titulo']; ?>
								</h3>
							</div>

							<div class="titulos">
								<h4 class="">
									<?php echo $tt_portafolio; ?>
								</h4>
								<div class="separador_gota"></div>
								<h4 class="">Bio</h4>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>

		<script>
			var circulos = document.getElementsByClassName('fotografoImagen'),
				fotografo = document.getElementsByClassName('fotografoContent'),
				wCirculos,
				tabla = "<?php echo $tabla; ?>";

			window.addEventListener('resize', function() {
				iniciar();
			});

			function iniciar() {
				wCirculos = circulos[0].offsetWidth;

				for (var c = 0; c < circulos.length; c++) {
					$('.imgFotografo').css({height:wCirculos+'px'});
					$('.circulo').css({height:wCirculos+'px'});
					$('.fotografoImagen').css({height:wCirculos+'px'});
				}
			}

			for(var f = 0; f < fotografo.length; f++){
				// PONER MASCARA
				var msk = document.createElement('img');

				if(tabla == 'contenidos'){
					msk.setAttribute('src', 'img/mascara.png');
				}else{
					msk.setAttribute('src', '../img/mascara.png');
				}

				msk.style.width = '100%';
				msk.style.opacity = '0';
				msk.className = 'mascara';

				circulos[f].appendChild(msk);

				fotografo[f].addEventListener("mouseover", function(e){
					var circulo = this.getElementsByClassName('circulo');
					var mascara = this.getElementsByClassName('mascara');
					circulo[0].style.opacity = 0;
					mascara[0].style.opacity = 1;
				});

				fotografo[f].addEventListener("mouseout", function(e){
					var circulo = this.getElementsByClassName('circulo');
					var mascara = this.getElementsByClassName('mascara');
					circulo[0].style.opacity = 1;
					mascara[0].style.opacity = 0;

				});
			}
		</script>

		<?php include( $ruta . 'requeridos/footer.php');?>
		<?php include( $ruta . 'requeridos/menu.php'); ?>
		<script src="<?php echo $ruta; ?>js/header.js" type="text/javascript"></script>
		<?php include( $ruta . 'requeridos/contacto.php'); ?>
		<script src="<?php echo $ruta; ?>js/contacto.js" type="text/javascript"></script>
	</body>
</html>
