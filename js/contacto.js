	////  ================ CONTACTO ======================
	
	$('#telefono').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var contacto = document.getElementById('contacto');
		var mask = document.getElementById('mask');
	
		mask.style.width  = window.innerWidth + 'px';
		mask.style.height = window.innerHeight + 'px';
		
		console.log( $('#mask').css('margin-top') )
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
		
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
        
		
		//transition effect
		$(contacto).fadeIn(2000); 
		
		contacto.style.top = '50%';
		contacto.style.left = '50%';
		
		contacto.style.marginTop  = - contacto.offsetHeight/2 + 'px';
		contacto.style.marginLeft = - contacto.offsetWidth/2 + 'px';	
		
		//if mask is clicked
		
		$('#mask').click(function () {
			$(this).hide();
			$('#contacto').hide();
			
		});	
		
		$('#btn_cerrarform').click(function () {
			
			$('#contacto').hide();
			$('#mask').hide();
			
		});	
		
		
		$(window).resize(function () {
			mask.style.width  = window.innerWidth + 'px';
			//mask.style.height = document.body.offsetHeight + 'px';
			mask.style.height = window.innerHeight + 'px';
			
			contacto.style.top = '50%';
			contacto.style.left = '50%';	
			
			contacto.style.marginTop  = - contacto.offsetHeight/2 + 'px';
			contacto.style.marginLeft = - contacto.offsetWidth/2 + 'px';
	 
		});
		
		//$('#hMenu').hide();
	
	});
	
	

	