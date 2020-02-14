// ============= EQUIPO ===================
	
	var quien;
	
	var jerome = document.getElementById('jerome');
	var nata = document.getElementById('nata');
	var diego = document.getElementById('diego');
	
	var wJerome = jerome.offsetWidth;
	

	
	var abiertoN = false;
	var abiertoD = false;
	var abiertoJ = false;
	
	wNata = jerome.offsetWidth;
	wDiego = jerome.offsetWidth;
	wJerome = jerome.offsetWidth;
	
	
	nata.style.left = -wNata +'px';
	diego.style.left = -wDiego +'px';
	jerome.style.left = -wJerome +'px';

	
	var arr1 = ['pestanaN', 'btn_nata'];
	var arr2 = ['pestanaD', 'btn_diego'];
	var arr3 = ['pestanaJ', 'btn_jerome'];
	
	
	
	// ABRIR
	// TARJETAS

	for(var b1 = 0; b1<arr1.length; b1++){
		$('#'+arr1[b1]).click(function(){
			$("#nata").animate({left:0});
			abiertoN = true;
		});
	}
			
	for(var b2 = 0; b2<arr2.length; b2++){
		$('#'+arr2[b2]).click(function(){
			$("#diego").animate({left:0});
			abiertoD = true;
		});
	}
	
	for(var b3 = 0; b3 < arr3.length; b3++){
	
		$('#'+arr3[b3]).click(function(){
			$("#jerome").animate({left:0});
			abiertoJ = true;
		});
		
		
	}
	
	

	// CERRAR 
	// TARJETAS
	
	$('#cerrarN').click(function(){
		quien = 'nata';
		abiertoN = false;
		cerrarBio();
	});
	
	$('#cerrarD').click(function(){
		quien = 'diego';
		abiertoD = false;
		cerrarBio();
		
	});
	
	$('#cerrarJ').click(function(){
		quien = 'jerome';
		abiertoJ = false;
		cerrarBio();
	});
	
	function cerrarBio () {
		//console.log(quien)
		//console.log(wJerome)
		$("#"+quien).animate({left:-wJerome +'px'});
	}
	
	
	
	// RESIZE
	//
	//
	function Ajustar(){
	
		wNata = nata.offsetWidth;
		wDiego = diego.offsetWidth;
		wJerome = jerome.offsetWidth;

		
		if( abiertoN == false){
			nata.style.left = -wNata +'px';
		
		}else{
			nata.style.left = '0px';
			
		}
		
		
		if( abiertoD == false  ){
			diego.style.left = -wDiego +'px';
		}else{
			diego.style.left = '0px';

		}

		
		if( abiertoJ == false  ){
			jerome.style.left = -wJerome +'px';

		}else{
			jerome.style.left = 0+'px';
			
		}

		if(window.innerWidth<900){
			centro.style.width = '70%';
		}else{
			centro.style.width = '700px';
		}
		
		
		
		wCentro = centro.offsetWidth;
		
		$('#centro').css({ marginLeft:-wCentro/2});
		
		logo.style.height = logo.offsetWidth / 5.38 + 'px';
		
		
	}
	
	
	
	var centro = document.getElementById('centro');
	var wCentro = centro.offsetWidth;
	
	var logo = document.getElementById('logo');
	var wLogo = logo.offsetWidth;
	
	window.addEventListener('resize', Ajustar, false);
	
	Ajustar();
	
	
	//============================= SCROLL ================================

	

	//$('#telefono').click( function () {
    //
	//	var quien = $(this).attr('rel');
	//	var destino = $('#contacto');
	//	$('html,body').animate({scrollTop: destino.offset().top-50}, 'slow', 'swing');
	//})
	