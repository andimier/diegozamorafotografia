<?php 
	if (isset($_GET['errorLog'])) {
		$errorLog = $_GET['errorLog'];
	}
?>

<html >
	<head>
		<?php require_once('includes/tags.php'); ?>
	</head>
	<body>
		<div id="cnt_login">
			<div id="mensaje_login">
				<?php 
					if (isset($_GET['errorLog'])) {
						echo $errorLog; 
					}
				?>
			</div>

			<form id="frm-login" action="referencia/ref.php" method="post">
				<label for="campo_usuario" id="labe">Nombre de Usuario</label>
				<input type="text" name="usuario" id="campo_usuario"  />

				<label for="password" id="label">Tu Contraseña</label>
				<input type="password" name="contrasena" id="password" maxlength="50" />

				<br />
				<br />
				<br />
				<input type="submit" name="enviardatos" class="boton_entrar fondo_verde" value="Ingresar" />
			</form>
		</div>

		<div id="cabezote" ></div>
	</body>
</html>
