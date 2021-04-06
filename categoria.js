$(document).ready(function () {

$.ajax({
    url: 'categorias.php',
    type: 'GET',
    dataType: 'json'
}).done(function(data) {
    var $select = $('#categoria').selectpicker();
    $.each(data, function(i,item){
        $select.append("<option></option>")
        .attr('value', item.c_id)
        .text(item.c_nombre)
    })
    });
});
