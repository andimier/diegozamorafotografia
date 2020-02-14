<?php 
	
	if ( $tabla == 'contenidos' ) {
		$tag_titulo  =  'Cientes, Diego Zamora Fotografía';
		$titulo_seccion= 'CLIENTES';
		$seccion_url = 'clients.php';
		$ruta = '';
		
		
	} else {
		$tag_titulo  =  'Clientes, Diego Zamora Photography';
		$titulo_seccion= 'CLIENTS';
		$seccion_url = 'clientes.php';
		$ruta = '../';
		
	}
?>

<!doctype html>
<html>
	<head>
		<?php include( $ruta .'requeridos/tags.php'); ?>
		<link rel="stylesheet" type="text/css"  media="screen" href="<?php echo $ruta; ?>css/clientes.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:800px)" href="<?php echo $ruta; ?>css/clientes-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="<?php echo $ruta; ?>css/clientes-pq.css" />
		<?php include( $ruta .'requeridos/tags-contacto.php'); ?>

	</head>

	<body>
		<?php include( $ruta .'requeridos/header.php'); ?>

		<div id="clientes" >
			<ul>
				<?php while($cliente = mysqli_fetch_array($r_contenidos)): ?>
					<li class="cliente linea">
						<?php echo $cliente['titulo']; ?>
					</li>
				<?php endwhile;?>
			</ul>
			
			<div class="vacio"></div>
		</div>
		
		<?php include( $ruta. 'requeridos/menu.php'); ?>
		<script src="<?php echo $ruta; ?>js/header.js" type="text/javascript"></script>
		
		<?php include( $ruta. 'requeridos/contacto.php'); ?>
		<script src="<?php echo $ruta; ?>js/contacto.js" type="text/javascript"></script>

		<?php include( $ruta. 'requeridos/footer.php'); ?>
	</body>
</html>