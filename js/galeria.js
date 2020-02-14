var contenedores = $('.cnt_categorias');

Contenedor = function(contenedor) {debugger
    this.categoryTitleContainer = $(contenedor).children().first();
    this.elements = $(contenedor).find('div.image-container');
    this.columnsContainer = document.createElement('DIV');

    this.createColumsLists();
}

Contenedor.prototype.createColumsLists = function() {
    var i = 0,
        count = 1,
        colum1 = [],
        colum2 = [],
        colum3 = [];

    $.each(this.elements, function(i, element) {
        switch(count) {
            case 1:
                colum1.push(element);
                break;
            case 2:
                colum2.push(element);
                break;
            default:
                colum3.push(element);

        }

        count = (count === 3) ? 1 : count + 1;
    });

    this.colums = [colum1, colum2, colum3];

    this.createColums();
}

Contenedor.prototype.createColums = function() {
    var self = this,
        mainContainer = document.getElementById('images-container');

    $.each(this.colums, function(i, colum) {
        var imagesColumContainer = document.createElement('DIV');

        imagesColumContainer.className = 'colum-images-container';

        $.each(colum, function(i, div) {
            imagesColumContainer.appendChild(div);
        });

        $(self.columnsContainer).prepend(self.categoryTitleContainer);
        self.columnsContainer.appendChild(imagesColumContainer);
        self.columnsContainer.className = 'colums-container';
    });

    mainContainer.appendChild(this.columnsContainer);
}

$.each(contenedores, function(i, val) {
    var contanedor = new Contenedor(val);
});