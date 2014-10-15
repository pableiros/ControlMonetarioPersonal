$( document ).ready(function()
{
    $("#tbodyTablaCategorias").on('click', '.BotonEditarCategoria', function() {
        var td = $(this).parent();
        var tr = td.parent();
        var idcategoria = $("td:nth-child(1)", tr).text();
        //alert(idcategoria);
        $(".BotonEditarCategoria").popover({
		    html: true, 
			content: function() {
		    	return $('#popover-content').html();
	        },
	        placement: 'right'
		});
    });
    $("#tbodyTablaCategorias").on('click', '.BotonProductosModal', function() {
    	$('#myModalProductos').modal('show');
        var td = $(this).parent();
        var tr = td.parent();
        var idcategoria = $("td:nth-child(1)", tr).text();
        //alert(idcategoria);
    });
});