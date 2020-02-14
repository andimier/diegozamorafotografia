<?php
	$con = mysqli_connect("localhost", "diegozam_andi", "pepita2017", "diegozam_base1");

	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else{
		echo 'si';
	}
	
	$q_albumes = 'SELECT * FROM albumes	WHERE seccion_id = 2 ';
	$r_albumes = mysqli_query($con, $q_albumes );
	
	while($busqueda = mysqli_fetch_array($r_albumes, MYSQLI_BOTH)){
		echo $busqueda['titulo'];
	}

?>