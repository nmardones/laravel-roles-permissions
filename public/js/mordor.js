function confirmarBorrado(id) {
    var action = $("#idFormDelete").attr('action');
    $("#idFormDelete").attr('action', action + '/' + id + '/delete');
}

function previsualizar(ruta) {
    $.ajax({
        data: $("#form1 input[type=checkbox][name*=ciclo]").serialize(),
        url: ruta,
        type: 'GET',
        beforeSend: function() {
            $("#cy").html("Procesando, espere por favor...");
        },
        success: function(response) {
            //$("#cy").html("<iframe frameborder='0' border='0' cellspacing='0' style='width: 100%; height: 300px' src=''>" + response + "</iframe>");
            $("#cy").html(response);
        }
    });
}
