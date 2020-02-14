 <!-- FORMULARIO DE CONTACTO -->

 
<?php 
	
	if($tabla == 'contenidos'){
		$nombre = 'nombre';
		$correo = 'correo';
		$mensaje = 'mensaje';
		$enviar = 'Enviar';
	}else{
		$nombre = 'name';
		$correo = 'e-mail';
		$mensaje = 'message';
		$enviar = 'Send';
	}
    
    echo "ruta = " . $ruta;
	
	require_once($ruta . '../requeridos/phpcontacto.php');

?>
	
<div id="contacto" class="fondo_verde3">
		
	<div id="contacto_telefono" ></div> 
	
	<div id="contacto_info" class="bg1">
		
		<p class="f_fell">
			<?php echo $texto_contacto; ?>
		</p>

		<form id="formulario" method="post" onsubmit="return validateForm()">
		   <label for="formText1" ><?php echo $nombre; ?></label>
		   <input type="text" name="nombre" id="formText1" />
		   
		   <label for="formText2" ><?php echo $correo; ?></label>
		   <input type="text" name="email" id="formText2" />
		   
		   <label for="formTextarea" ><?php echo $mensaje; ?></label>
		   <textarea name="mensaje" id="formTextarea"></textarea>
		   
		   <label for="formTextarea" class="fWhite"></label>
		   <input type="submit" class="" name="enviar_contacto" id="enviar_contacto" value="<?php echo $enviar; ?>" />
		</form>
		
		<div id="btn_cerrarform">x</div>
	  
	</div><!-- termina contactoContent -->
	
	
	
</div><!-- termina contacto -->
	
	
<div id="mask"></div>


<script>
			
	function validateForm(){
		

		var email = document.forms["formulario"]["email"].value;
		var atpos  = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		
		var x = document.forms["formulario"]["nombre"].value; 
		var y = document.forms["formulario"]["email"].value; 
		var z = document.forms["formulario"]["mensaje"].value;
	
		
		if (atpos<1 || dotpos < atpos+2 || dotpos+2 >= email.length){
		  alert( "El correo que ingresaste no es valido o está vacío" );
		  return false;
		}else if ( z == null || z == ""){
			alert("Por favor escribe un correo electrónico");
			return false;
		}
		
		if ( x == null || x == "" ){
		  alert("Por favor escribe tu nombre");
		  return false;
		}else if ( y == null || y == "" ){
			alert("Por favor escribe un teléfono");
			return false;
		}
	}
</script>
	