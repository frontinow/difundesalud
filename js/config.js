
/* Script para mostrar la Cantidad de Registros en otro Lugar */
jQuery(function($) {

    var valor = $('.summary').html();
    $('.paginationsize').html(valor);
    
    $('input[type=password]').addClass('form-control');
    $('input[type=text]').addClass('form-control');
    $('textarea').addClass('form-control');
    $('select').addClass('form-control');  

});


