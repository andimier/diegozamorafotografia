<?php

	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "app");
	
	$mensaje = "";
	$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	
	if(!$connection){
		die("La conexion a la base de datos fallo: " . mysql_error());
	}
	$db_select = mysql_select_db("app",$connection);
	if(!$db_select){
		die("La Seleccion de la base de datos fallo: " . mysql_error());
	}
	
	
	$numero = 0;

	
	if(isset($_POST['enviar'])){
	
		$nombre = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$correo = $_POST['email'];
		
		
		$archivo = $_FILES['foto'];
		$temp_path = $archivo['tmp_name'];
		$nombre_archivo = basename($archivo['name']);
		
		$errores = array();
		
		$required_fields = array('nombre','telefono', 'email');
		
		foreach($required_fields as $fieldname){
			
			if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))){
				$errores[] = $fieldname;	
			}
		}
		
		if(empty($errores)){
			
			echo $nombre;
			echo $telefono;
			echo $correo;
			echo $archivo;
			
			/*
			if(empty($nombre_archivo)){
				$mensaje = '<div id="mj2">No subiste nada, intenta de nuevo!</div>';
				
			}else{
			
				$q_contenidos = "SELECT id FROM imagenes";
				
				if($r_contenidos = mysql_query($q_contenidos, $connection)){
					
					$numero2 = mysql_num_rows($r_contenidos);
					$numero = $numero2+1;
					$nombre_archivo = $numero . '.jpg';
					
					$sql  = 
					"INSERT INTO imagenes 
					(nombre, telefono, correo, imagen, valor) 
					VALUES 
					('$nombre', $teléfono, '$correo','$nombre_archivo', 1)";
					$insertar = mysql_query($sql, $connection);
					
					
					// INSERTAR IMAGEN EN CARPETA
					$destino = "imagenes/" . $nombre_archivo;
					if(move_uploaded_file($temp_path, $destino)){
						$mensaje = '<div id="mj1">Tu foto ha sido subida!</div>';
					}
					
					
					// INSERTAR IMAGEN EN SEGUNDO ARRAY
					$q_imagenes2  = "INSERT INTO imagenes2 (imagen, valor) VALUES ('$nombre_archivo', 1)";
					$r_imagenes2 = mysql_query($q_imagenes2, $connection);
					
				}else{
					echo 'nada';
					
				};
			
			};  // ==> ARRAY !!!
			*/
		}else{
			$mensaje = '<div id="mj2">Completa el formulario e intenta de nuevo!</div>';
		}

		
	}else{
		
	}

?>



<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width , initial-scale=1 , user-scalable=no"/>
		<link rel="stylesheet" type="text/css"  media="screen" href="estilos/formulario-gr.css"  />
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/formulario-pq.css" />
		
		
		<script src="js/jquery-1.11.3.min.js"></script>
	</head>
	<body>
		<div id="cabezote">
			<h1> YA ESTÁS REGÍSTRADO EN Apps.co 2.0</h1>
		</div>
	
	</body>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	