$(window).ready(function () {
    $("#creacion_pj").addClass('animated fadeInDown');
    $("#personaje_clase").addClass("animated fadeInRight");
    $("#personaje_historia").addClass("animated fadeInRight");
    $("#personaje_info").addClass("animated fadeIn");


})


$(function () {
    var nombre = $('#nombre').val();

    var $avatarImage, $avatarInput, $avatarForm;

    $avatarImage = $('#' + nombre + '_imagen');
    $avatarInput = $('#archivo_subida');
    $avatarForm = $('#avatarForm');
    $avatarImage.on('click', function () {
        $avatarInput.click();
    });

    $("#nombre").on('change', function () {
        var pathusername = $('#imagen').val();
        var ruta_imagen = pathusername.split('/');
        $('#imagen').attr('value', ruta_imagen[0] + "/" + $("#nombre").val() + ".jpg");

        var formData = new FormData();
        formData.append('nombre_antiguo', nombre);
        $.ajax({
            url: "/renamePhoto" + '?' + $avatarForm.serialize(),
            method: $avatarForm.attr('method'),
            data: formData,
            processData: false,
            contentType: false

        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert(jqXHR.status);
            alert(textStatus);
            alert(errorThrown);
        });

    })

    $avatarInput.on('change', function () {

        if ($avatarInput.val() != null) {
            $('#imagen').attr('value', "");


        }
        var formData = new FormData();
        formData.append('photo', $avatarInput[0].files[0]);
        $.ajax({
            url: "/perfil/foto" + '?' + $avatarForm.serialize(),
            method: $avatarForm.attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                //imagen de carga
                //alert('cambiando');
                document.getElementById("imagen_subida").style.display = 'block';
                //document.getElementById("imagen_subida").style.display = 'none';

            }
        }).done(function (data) {
            setTimeout(function () {
                document.getElementById("imagen_subida").style.display = 'none';
            }, 2000)
            //alert('cambio hecho ');
            $avatarImage.attr('src', "/avatares/" + data);
            //$('#imagen').attr('value', data);


        })
            .fail(function (jqXHR, textStatus, errorThrown) {
                alert('La imagen subida no tiene un formato correcto');
                alert(jqXHR.status);
                alert(textStatus);
                alert(errorThrown);
            });
    });
});

$("#name").keydown(function () {
    var nombre = $("#name").val();


    $.ajax({
        url: "/registro_usuario",
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

