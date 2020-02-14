<?php 
	require_once("includes/sesion.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");
	
	$mensaje = "";
	
	date_default_timezone_set('America/Bogota');
	$fecha = date("Y-m-d");
	
	
	$imagen1 = '';
	$imagen2 = '';
	$imagen3 = '';
	
	
	
	
	require_once('edicion/insertar_contenidos.php');
	//require_once('edicion/cambioimagen1.php');
	require_once('edicion/edc_imagenes/img_cambio.php');
	
	
	
	encontrar_seccion_y_contenido_seleccionados();
	
	
	
	if( isset( $_GET['contenido_id']) ){
		
		
		$id = mysql_prep($_GET['contenido_id']);
		$seccion_id = mysql_prep($_GET['seccion_id']);
		
		$q_contenido = "SELECT * FROM contenidos WHERE contenido_id = {$id} ORDER BY fecha DESC";
		
		$contenidos = mysql_query($q_contenido, $connection);
		confirm_query($contenidos); 
	}
	

	
	
	//========== PARAMETROS FORMULARIO ACTUALIZACION DE CONTENIDOS =================//
	
	$tabla   = "contenidos";	
	
	
	
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


	<head>
		<?php include_once('includes/tags.php'); ?>
	</head>
	
	
	<body>
		
		
		
		
		<div id="cnt_edicion">
		
		
			<div id="col2">
			
		
				<h3><?php echo $contenido_seleccionado['titulo']; ?></h3>
				
				
				
				<h4>Insertar nuevo contenido</h4>
				
				Titluo:
				<form enctype="multipart/form-data" method="post">
				
					<input type="hidden" name="tabla"          value="imagenes_publicaciones" />
					<input type="hidden" name="contenido_id"   value="<?php echo $contenido_seleccionado['id'];?>" />
					<input type="hidden" name="seccion_id"     value="<?php echo $seccion_id;?>" />
					
					<input type="text"   name="titulo"         value="" size="50" maxlength="50" class="borde_puntos letra_roja"/>
					<br />
					<input type="submit" name="insertar_contenido" value="insertar contenido" class="fondo_rojo"/>
				</form>
				
				<br />
				<br />
				
				<div class="mensaje"> <?php echo $mensaje . '<br /><br /><br />'; ?></div>
				
				
				<strong>Haz click sobre el titulo del contenido para editarlo.</strong>
				
				<br />
				<br />
				
				

				
				<ul>
					<?php while($contenido = mysql_fetch_array($contenidos)): ?>
					
						
						<a href="editar-contenido.php?contenido_id=<?php echo urlencode($contenido['id']); ?>">
							<li><?php echo $contenido["titulo"]; ?></li>
						</a>
						
					<?php endwhile; ?>
				</ul>


			</div>
		
		</div>
		
		
		
		
		<!--  
		IMAGEN PRINCIPAL
		DE LA SECCION 
		-->
		
		<?php 
			if(empty($imagenprincipal)){
			
			}else{
				require_once('edicion/edc_imagenes/img_principal.php'); 
			}
		
		?>
		
		
		
		<div id="footer"></div>
		
		
		<?php include_once('includes/navegacion.php'); ?>
		<?php include_once('includes/cabezote.php'); ?>

		<script src="js/general.js" type="text/javascript"></script>
		
	</body>
	
</html>


<?php 
	if(isset($connection)){
		mysql_close($connection);
	}
?>




