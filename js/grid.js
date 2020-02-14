//new AnimOnScroll( document.getElementById( 'grid' ), {
			//	minDuration : 0.4,
			//	maxDuration : 0.7,
			//	viewportFactor : 0.2
			//} );

var resizeTimeout,
    timeout;



function calcularAnchoImagenes() {
    var factor,
        margin,
        frame = window.innerWidth,
        ancho;

    if (frame > 699) {
        factor = 3;
        margin = 50;
    } else {
        factor = 2;
        margin = 20;
    }
    
    ancho = Math.floor((frame - margin) / factor);

    return ancho;
}

function ajustarTamañoImagenesGaleria() {
    var ancho = calcularAnchoImagenes();

    $.each($('.grid-item'), function() {
        $(this).css({
            "width": ancho,
            "padding": "0 2px",
            "box-sizing": "border-box"
        });
    });
}

function iniciarGaleria() {
    var ancho = calcularAnchoImagenes();
    
    ajustarTamañoImagenesGaleria();

    $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: ancho
    });
    
    
}

window.addEventListener('resize', function () {
    clearTimeout(resizeTimeout);

    resizeTimeout = setTimeout(function () {
        iniciarGaleria();   
    }, 1000);
});

window.onload = function() {
    iniciarGaleria();
}


