$(window).ready(function () {
    $("#creacion_pj").addClass('animated fadeInDown');
    $("#personaje_clase").addClass("animated fadeInRight");
    $("#personaje_historia").addClass("animated fadeInRight");
    $("#personaje_info").addClass("animated fadeIn");


})
$("#archivo_subida").change(function () {
    var imagen_nueva = $("#archivo_subida").val();

    $.ajax({
        url: "carga_archivos.php",
        type: "GET",
        data: {imagen:imagen_nueva},
        beforeSend: function () {
            //imagen de carga
            document.getElementById("imagen_subida").style.display = 'block';
            setTimeout(function () {
                document.getElementById("imagen_subida").style.display = 'none';
            }, 2000)
        }

    })
        .done(function (request) {
            alert(request.val());

        })
        .error(function () {
            alert("ha habido un problema");
        })
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

$(".imagen").parent(".enlace").hover(function () {
    $(this).children('.collapse').collapse('show');
}, function () {
    $(this).children('.collapse').collapse('hide');


})

$(".enlace").click(function () {
    $(".mas").toggle('fast');
})

$(document).ready(function () {
    // Este comando es usado para inicializar algunos elementos y hacerlos funcionar de modo apropiado
    $.material.init();
})

