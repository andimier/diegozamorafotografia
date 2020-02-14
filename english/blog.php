<?php 
	
	

	
	require_once('../requeridos/conexion/connection.php');
	$seccion = 5;
	$tabla = 'contenidos2';
	require_once('../requeridos/qs.php');
	
	$ruta = ($tabla == 'contenidos2') ? $ruta = '../': $ruta = '';
	$titulo_seccion = ($tabla == 'contenidos2') ? $titulo_seccion = 'HOME': $titulo_seccion = 'INICIO';
	$estudio = ($tabla == 'contenidos') ? $estudio = 'ESTUDIO DE FOTOGRAFÍA': $estudio = 'FOTOGRAPHY STUDIO';
	
	
	if( $tabla == 'contenidos' ){
		$tag_titulo  =  'BLOG';
		$titulo_seccion= 'BLOG';
		$seccion_url = 'blog.php';
		$ruta = '';
		
	}else{
		$tag_titulo  ='BLOG';
		$titulo_seccion= 'BLOG';
		$seccion_url = 'blog.php';
		$ruta = '../';
	}
	
?>


<!doctype html>
<html>
	<head>
		<meta  http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
		<title>blog</title>
		<meta name="viewport" content="width=device-width , initial-scale=1 , user-scalable=no"/>
		
		<?php include('../requeridos/tags.php'); ?>
		
		
		<link rel="stylesheet" type="text/css"  media="screen" href="../css/blog.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:800px)" href="../css/blog-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="../css/blog-pq.css" />
		
		
		<?php include('../requeridos/tags-contacto.php'); ?>
		
	
	</head>

	<body>
		
		<?php if(file_exists("../requeridos/header.php")){include('../requeridos/header.php'); 	}?>
		
		
	
		
		
		<div class="camIcon2"><img src="../img/cam4.png"/></div>

		
		<div class="cnt">
			
			<?php while($contenido = mysql_fetch_array($r_contenidos)): ?>
				<div class="cnt_entrada">

					<div class="tt_entrada gris"><?php echo $contenido['titulo']; ?></div>
					
					<div class="cnt_img"><img src="../cms/<?php echo $contenido['imagen3']; ?>" /></div>
					
					
					<p class="f_open grismedio just"><?php echo $contenido['contenido']; ?></p>
					
				</div>
			<?php endwhile; ?>
			
		</div>

		
		<?php if(file_exists("requeridos/footer.php")){include('../requeridos/footer.php'); 	}?>
		
		
		<?php include('../requeridos/menu.php'); ?>
		<script src="../js/header.js" type="text/javascript"></script>
		<?php include('../requeridos/contacto.php'); ?>
		<script src="../js/contacto.js" type="text/javascript"></script>

		
	</body>
</html>
