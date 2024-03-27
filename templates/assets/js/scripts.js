$(document).ready(function() {
    $("#busca").keyup(function () {
        $('#buscaResultado').css('display', 'block')
        var busca = $(this).val();
        if( busca !== ""){
            $.ajax({
                url: $('form').attr('data-url-busca'),
                method: 'POST',
                data: {
                    busca: busca
                },
                success: function (data) {
                    $('#buscaResultado').html(data);
                }, 
            });
        } else {
            $('#buscaResultado').css('display', 'none')
        }
    });
});