	var menu = document.getElementById('menu'),
		margen,
		abierto = false,
		showAt = 100,
		logo = document.getElementById('logo'),
		cnt = document.getElementById('cnt_enlaces').offsetHeight;

	function Inicio(){
		// ESTE IF() LO PONGO PORQUE POR ALGUNA RAZON, LA ALTURA DEL HEADER
		// AL INICIAR, TIENE 94PX DE MÁS

		if (window.innerWidth > 800) {
			menu.style.height = '66px';

			if (abierto == false) {
				menu.style.top = - 66 + 'px';
			} else {
				menu.style.top = 0 + 'px';
			}
		} else {
			menu.style.height = '110px';

			if (abierto == false) {
				menu.style.top = - 110 + 'px';
			} else {
				menu.style.top = 0 + 'px';
			}
		}

		logo.style.height = logo.offsetWidth / 5.38 + 'px';
	}

	function Cuadrar(){
		Inicio();
	}

	$('#pestana').click( function() {

		if (abierto==false) {
			$('#menu').animate({top:0});
			$('#pestana p').text('X');
			abierto = true;

		} else {
			if (window.innerWidth > 800) {
				margen = 66;
			} else {
				margen = 110;
			}

			$('#menu').animate({top:-margen+'px'});
			$('#pestana p').text('MENU');
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

	$(window).scroll(function() {
		if (document.body.scrollTop > showAt) {
		   $("#btn_subir" ).css('visibility',"visible");
		} else {
			$("#btn_subir" ).css('visibility',"hidden");
		}
	});

	$('#btn_subir').click( function () {
		$('html,body').animate({scrollTop: 0}, 'slow');
	})

	window.addEventListener('resize', Cuadrar, false);

	Inicio();
