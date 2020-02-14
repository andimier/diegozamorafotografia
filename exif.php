<?php
	/*
	echo "yobailando.jpg:<br />\n";
	$exif = exif_read_data('img/julieta.jpg', 'IFD0');
	echo $exif===false ? "No se encontró información de cabecera.<br />\n" : "La imagen contiene cabeceras<br />\n";
*/
	$exif = exif_read_data('img/julieta.jpg', 0, true);
	//echo "prueba2.jpg:<br />\n";
	
	foreach ($exif as $clave => $seccion) {
		foreach ($seccion as $nombre => $valor) {
			echo "$clave.$nombre: $valor<br />\n";
		}
	}
	/*
	echo '<br >';
	echo '<br >';

	echo $exif['FILE']['FileName'].'<br>';
	
	if( !isset($exif['FILE']['FileType'])){
		echo 'no hay copy <br>';
	}else{
		echo $exif['FILE']['FileType'].'<br>';
	}
foreach ($exif as $clave => $seccion) {
		
			echo "$clave<br />\n";
		
	}
*/
	
	
?>