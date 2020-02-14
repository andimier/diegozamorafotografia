<?php
	require_once("includes/requeridos.php");
	
	$mensaje = "";
	$mensaje2 = "";
	$imagen = "";
	
	$id        = "";
	$fecha     = "";
	$titulo    = ""; 
	$contenido = "";
		
	
	require_once("edicion/actualizaciondecontenidos.php");
	
	if(intval($_GET['contenido_id']) == 0){
	
		header("Location: content.php");	
		exit;
		
	}else{
	
		$id = $_GET['contenido_id'];
		$contenido_id = $_GET['contenido_id'];
		$tabla = "contenidos2";	
		
		$query = "SELECT * FROM contenidos2 WHERE id =" . $contenido_id ." LIMIT 1";
		$resultado = mysql_query($query, $connection);
		
		
		while($campo = mysql_fetch_array($resultado)){
			
			$fecha     = $campo['fecha'];
			$titulo    = $campo['titulo']; 
			$contenido = $campo['contenido'];
			$seccion   = $campo['seccion_id'];
			$indice    = $campo['indice'];
			$posicion  = $campo['posicion'];
			
			$imagenprincipal = $campo['imagen1'];
			$img = $campo['imagen2'];
		}
	}
	
	

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


	<head>

		<?php include_once('includes/tags.php'); ?>

	</head>
	
	<body>
	
		
	
		<div id="cnt_edicion">

			<div id="col2">
			
				<div id="idioma2">inglés</div>
				<?php echo $titulo;?>
				<br />
				
				<br />
				
				<div class="titulo-rojo"><a href="editar-contenido.php?contenido_id=<?php echo $id; ?>">Volver al Contenido en Español</a></div>
				<br />
				
				<div class="mensaje"> <?php echo $mensaje; ?></div>  
				<div id="formulario">
				<?php require_once("edicion/formularioedicion1.php"); ?>
				</div>
				<!--<h3><a href="eliminar_noticia.php?noticia=<?php echo urlencode($id);?>" onClick="return confirm('Eliminar Contenido?')" >
				<img src="iconos/basura_01.jpg" width="20"/>Eliminar Contenido</a>  &nbsp;/&nbsp;  <a href="content.php">Cancelar</a></h3>-->
				
			</div>

			
		</div>

		
		<?php include_once('includes/navegacion.php'); ?>
		<?php include_once('includes/cabezote.php'); ?>
		<div id="footer"></div>
		
		<script src="js/general.js" type="text/javascript"></script>
	
	</dody>
	
</html>
