	<?php 
		if($tabla == 'contenidos'){
			$link1 = 'INICIO';
			$link2 = 'PORTAFOLIO';
			$link3 = 'CLIENTES';
			
			$link1_url = 'index.php';
			$link2_url = 'portafolio.php';
			$link3_url = 'clientes.php';
		}else{
			$link1 = 'HOME';
			$link2 = 'PORTFOLIO';
			$link3 = 'CLIENTS';
			
			$link1_url = 'index.php';
			$link2_url = 'portfolio.php';
			$link3_url = 'clients.php';
		}
	?>
	
	<div id="menu" >
		
		<div id="cnt_enlaces">
		
			<div id="enlaces">
				<div class="hMenuItem">
					<a href="<?php echo $link1_url; ?>"><?php echo $link1; ?></a>
				</div>
				
				<!--<div class="hMenuItem"><a href="fotografos.php">FOTÓGRAFOS</a></div>-->
				<div class="hMenuItem">
					<a href="<?php echo $link2_url; ?>"><?php echo $link2;  ?></a>
				</div>
				
				<div class="hMenuItem">
					<a href="<?php echo $link3_url; ?>"><?php echo $link3;  ?></a>
				</div>
				<div class="hMenuItem"><a href="https://www.flickr.com/photos/diegozamoramelendez" target="_blank">FLICKR</a></div>
				<div class="hMenuItem"><a href="blog.php">BLOG</a></div>
			</div>
			
			<div id="pestana">
				<p>MENU</p>
			</div>
		</div>

		<div id="btn_subir"></div>
		
	</div>
	
	<!-- fin de hmenu-->
