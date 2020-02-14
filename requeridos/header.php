<?php 

	if ($tabla == 'contenidos') {
		$idiomas = 'english/'. $seccion_url; 
		$boton = 'url(img/btn-idiomas2.png)';
	}else{	
		$idiomas = '../'. $seccion_url; 
		$boton = 'url(../img/btn-idiomas1.png)';
	}
?>

<div id="header">
	<a href="<?php echo $idiomas?>">
		<div id="cnt_idiomas" style="background-image:<?php echo $boton; ?>;"></div>
	</a>
	<div id="telefono"></div>
</div>

<div id="logo2"></div>
<div class="tt_principal2">
	<h2><?php echo $titulo_seccion; ?></h2>
</div>

<div class="gota2"></div>