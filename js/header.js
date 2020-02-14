	
	
	// ============= HEADER ===================
	
	var menu = document.getElementById('menu');
	var margen;
	
	//var cnt = document.getElementById('hMenuContainer').offsetHeight;
	
	
	var abierto;
	abierto = false;
	
	
	
	
	
	
	function Cuadrar(){
		Inicio();	
	}
	
	
	function Inicio(){
		
		
		// ESTE IF() LO PONGO 
		// PORQUE POR ALGUNA RAZON, LA ALTURA DEL HEADER
		// AL INICIAR, TIENE 94PX DE MÃS
		
		//margen = menu.offsetHeight;
		
		
		
		if( window.innerWidth > 800){
			//margen = '66px';
			menu.style.height = '66px';
			//menu.style.top = 0+'px';
			
			if(abierto == false){
				menu.style.top = - 66 + 'px';
				//console.log('cerrado')
			}else{
				menu.style.top = 0 + 'px';	
			}

		}else{
			//margen = '120px';
			menu.style.height = '110px';
			//menu.style.top = 0;
			if(abierto == false){
				menu.style.top = - 110 + 'px';
				//console.log('cerrado')
			}else{
				menu.style.top = 0 + 'px';	
			}

		}
	    
	
	}
	
	var cnt = document.getElementById('cnt_enlaces').offsetHeight;
	//console.log('cnt='+cnt)
	

   
	$('#pestana').click( function() {
	
		if(abierto==false){
			$('#menu').animate({top:0});
			
			$('#pestana p').text('X');
			abierto = true;
			
		}else{
			if( window.innerWidth > 800){
				margen = 66;
			}else{
				margen = 110;
			}
			
			$('#menu').animate({top:-margen+'px'});
			
			$('#pestana p').text('Menú');
			abierto = false;
		}
   
	});
	
	


	// ============= BOTON CAMBIO IDIOMA ===================
	/*
	$('#idioma1').click(function(){
		$('#btn_idioma').css({backgroundImage:'url(../img/btn-idioma1.png)'});
	});
	
	$('#idioma2').click(function(){
		$('#btn_idioma').css({backgroundImage:'url(../img/btn-idioma2.png)'});
	});
	*/
	
	
	// ============= BOTON SUBIR ===================
	
	var showAt= 100;
	
	$(window).scroll(function() {
  
		if (document.body.scrollTop > showAt) {
		   $("#btn_subir" ).css('visibility',"visible");
		}else{
			$("#btn_subir" ).css('visibility',"hidden");
		}
	});
	
	
	//============================= SCROLL ================================
	

	$('#btn_subir').click( function () {
 
		$('html,body').animate({scrollTop: 0}, 'slow');
	})
	

	

	
	var ttSeccion = document.getElementsByClassName('tt_principal2');
	
	
	
	window.addEventListener('resize', Cuadrar, false);
	
	Inicio();
