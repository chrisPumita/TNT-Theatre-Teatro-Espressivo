// lo que sejecuta primero
$(document).ready(function () {
    //-------------------seleccionando el elemento boton agregar elemento

    console.log("LLELO SEND")

});

$('#frm-contacto').submit(function (e) {
    e.preventDefault();
    let terminos = !document.getElementById("terms").checked ? true:false;
    if(terminos) {
        alert("No selecciono los terminos y condiciones");
    }
    else{
        terminos = true;
        const valoresCajas = {
            name: $('#name').val(),
            email: $('#email').val(),
            institucion: $('#institucion').val(),
            telefono: $('#telefono').val(),
            telefono2: $('#telefono2').val(),
            obra: $('#obra').val(),
            comentario: $('#comentario').val(),
            terms: terminos
        };
        let url = "./control/send.php";
        $.post(url,valoresCajas,function (mje)
        {
            //tratamos los datos y hacemos acciones
            console.log(mje);
            Swal.fire(
                'Mensaje Enviado',
                mje,
                'success'
            )
          //  setTimeout( function() { window.location.href = "./"; }, 5000 );
        });
        $('#frm-contacto').trigger('reset');

    }
});
//-------------------seleccionando el elemento boton agregar elemento