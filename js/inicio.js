	
	
	// ============= HEADER ===================
	
	var hMenu = document.getElementById('hMenu');
	var h_hMenu;
	
	
	var abierto;
	abierto = false;
	
	Inicio();
	
	window.addEventListener('resize', Cuadrar, false);
	
	
	function Cuadrar(){
		Inicio();	
	}
	
	
	function Inicio(){
		
		
		// ESTE IF() LO PONGO 
		// PORQUE POR ALGUNA RAZON, LA ALTURA DEL HEADER
		// AL INICIAR, TIENE 94PX DE MÃS
		
		if( window.innerWidth > 800){
			h_hMenu = 66;
		}else{
			h_hMenu = hMenu.offsetHeight;
		}
	
		
		console.log(h_hMenu);
		
		if(abierto == false){
			hMenu.style.top = - h_hMenu + 'px';
			//console.log('cerrado')
		}else{
			hMenu.style.top = - 0 + 'px';	
		}
		
		
		//console.log(hMenu.style.top);
		
	}
	
	
	
	

	$('#pestana').click( function() {
	
		if(abierto==false){
			$('#hMenu').animate({top:0+'px'});
			
			$('#pestana p').text('X');
			abierto = true;
			
		}else{
			$('#hMenu').animate({top:-h_hMenu+'px'});
			
			$('#pestana p').text('Menú');
			abierto = false;
		}

	});
	
	


	// ============= BOTON CAMBIO IDIOMA ===================
	
	$('#hLanguageOption2').click(function(){
		$('#hLanguageButton').css('background-position','-202px')
	});
	
	$('#hLanguageOption1').click(function(){
		$('#hLanguageButton').css('background-position','-162px')
	});
	
	
	
	
