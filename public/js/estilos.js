$(window).ready(function () {
    $("#creacion_pj").addClass('animated fadeInDown');
    $("#personaje_clase").addClass("animated fadeInRight");
    $("#personaje_historia").addClass("animated fadeInRight");
    $("#personaje_info").addClass("animated fadeIn");
    $('.animate').scrolla();

    $('.animate').scrolla({
        mobile: false
    });

})


$("#name").keydown(function () {
    var nombre = $("#name").val();



        $.ajax({
            url: "consultas.php",
            type: "GET",
            data: {nombre: nombre},
            beforeSend: function () {
                //imagen de carga
                document.getElementById("imagen_carga").style.display = 'block';
                setTimeout(function () {
                    document.getElementById("imagen_carga").style.display = 'none';
                }, 2000)
            }
        })

            .done(function (request) {
                setTimeout(function () {
                    $("#name_respuesta").html(request);

                }, 1999)

            })
            .error(function () {
                alert("ha habido un problema");
            })

})


$(".enlace").click(function () {
    $(".mas").toggle('fast');
})

$(document).ready(function () {
    // Este comando es usado para inicializar algunos elementos y hacerlos funcionar de modo apropiado
    $.material.init();
})

