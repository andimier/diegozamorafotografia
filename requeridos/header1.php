	<?php 

		if($tabla == 'contenidos'){
			$idioma = 'english/'. $seccion_url; 
			$boton = 'url(img/btn-idiomas2.png)';	
		}else{
			$idioma = '../'. $seccion_url;
			$boton = 'url(../img/btn-idiomas1.png)';			
		}
	?>

	<div id="header">

		<a href="<?php echo $idioma; ?>">
			<div id="cnt_idiomas" style="background-image:<?php echo $boton; ?>;"></div>
		</a>

		<div id="telefono"></div>

	</div>
	
	