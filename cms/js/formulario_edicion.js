	
	
	// BOTON FUNCION
	// PEGAR DESDE WORD
	
	
	var BotonPegar= document.getElementById('btn_pegar');
	
	BotonPegar.addEventListener('click', VerCampoPegar, false);
	
	var BotonCompletar= document.getElementById('btn_completar');
	var Boton1 = document.getElementsByClassName('boton1');
	
	
	function VerCampoPegar(){
	
		BotonPegar.removeEventListener('click', VerCampoPegar, false);
		$('#caja1').animate({marginTop:'-430px'}, function(){
		
		
			BotonPegar.innerHTML = 'Cerrar';
			BotonPegar.style.backgroundColor = '#000';
			BotonPegar.style.color = '#fff';
			BotonPegar.addEventListener('click', CerrarCampoPegar, false);
			
			BotonCompletar.style.display = 'block';
			Boton1[0].style.display = 'none';
		});
	}
	
	
	
	function CerrarCampoPegar(){
	
		BotonPegar.removeEventListener('click', CerrarCampoPegar, false);
		$('#caja1').animate({marginTop:'0px'}, function(){
		
			BotonPegar.innerHTML = 'Pegar desde Word';
			BotonPegar.style.backgroundColor = '#ccc';
			BotonPegar.style.color = '#000';
			BotonPegar.addEventListener('click', VerCampoPegar, false);
			
			BotonCompletar.style.display = 'none';
			Boton1[0].style.display = 'block';
		});
	}
	
	
	
	// EVITAR EL
	// COPY PASTE
	
	$('#caja1').bind('copy paste',function(e) {
		e.preventDefault(); return false; 
	});
	
	
	
	
	// PRECESAMIENTO DEL
	// CONTENIDO QUE SE 
	// VA A PEGAR DESDE WORD
	
	
	var caja1 = document.getElementById('caja1');
	caja1.contentEditable = true;
	
	var texto = document.createTextNode(caja1.innerHTML);
	
	
	//var pre = document.createElement("pre");
	//pre.id = "sourceText";
	//pre.contentEditable = true;
	//pre.style.width = '96%';
	//pre.style.height = '96%';
	//pre.style.margin = '0 0 0 0';
	//pre.style.padding = '2% 2% 2% 2%';
	//
	////pre.style.backgroundColor = '#f00';
	//pre.appendChild(texto);
	
	
	//
	
	
	
	var caja2 = document.getElementById('caja2');
	//caja2.appendChild(pre);
	caja2.appendChild(texto);

	
	
	
	function QuitarFormato(){
	
		
		var caja3  = document.getElementById('caja3');
		
		
		//var contenido = caja1.innerHTML;
		/*

		var tagStripper = new RegExp('<(/)*(meta|link|span|p|u|a|style|\\?xml:|st1:|o:|font)(.*?)>','gi');
		//var tagStripper = new RegExp('<(/)*(meta|u|link|span|p|style|\\?xml:|st1:|o:|font)(.*?)>','gi');
		
		//var tagStripper = '<([A-Z][A-Z0-9]*)\b[^>]*>.*?</\1>';
		
		var res = contenido.replace(tagStripper, '');
		
		document.execCommand('removeFormat', false, null);
	

		//console.log(res);
		
		
		//submit_form
		
		caja1.innerHTML = res*/
		//var res = contenido.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '<br />');
		//caja2.innerHTML = res;
		
		var contenido = caja2.innerHTML;
		contenido = caja2.innerText;
		
		texto = document.createRange();
		texto.selectNodeContents(caja2.firstChild);
		
		//caja3.innerHTML = contenido;
		//caja3.innerHTML = texto.toString();
		
		var res = contenido.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '<br />');
		
		caja2.innerHTML = res;
		caja1.innerHTML = res;
		
		//pre.innerHTML = contenido;
		//caja2.innerHTML = contenido;
		//caja1.innerHTML = contenido;
		
		//console.log(contenido);
		
		
	
	}
	

	
	function submit_form(){
	
	
		var elFormulario = document.getElementById("formularioedicion1");
		
		var contenido = caja1.innerHTML;
		
		var remplazo = contenido.replace(/<div>/g, '<br />');
		var remplazo2 = remplazo.replace(/<\/div>/g, '');
		
		elFormulario.elements["areadetexto"].value = remplazo2;
		
		//var remplazo = contenido.replace(/<div>/g, '');
		//elFormulario.elements["areadetexto"].value = remplazo;
		
		//elFormulario.elements["areadetexto"].value = contenido;
		
		elFormulario.submit();
		
		
	}
