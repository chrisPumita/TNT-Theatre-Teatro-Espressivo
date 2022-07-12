<?php
if (isset($_POST['name']) ||
    isset($_POST['email']) ||
    isset($_POST['institucion']) ||
    isset($_POST['telefono']) ||
    isset($_POST['obra']) ||
    isset($_POST['terms']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $institucion = $_POST['institucion'];
    $telefono = $_POST['telefono'];
    $telefono2 = $_POST['telefono2'];
    $obra = $_POST['obra'];
    $terms = $_POST['terms'];
    $comentario = $_POST['comentario'];
    include_once "./enviaMail.php";


    if(enviaCorreo($name,$email,$institucion,$telefono,$telefono2,$obra,$comentario,false))
        if (enviaCorreo($name,$email,$institucion,$telefono,$telefono2,$obra,$comentario,true))
            echo "Hemos recibido sus datos, en breve uno de nuestros agentes se pondrá en contacto con usted al correo ".$email;
    else
        echo "Ocurrio un error interno en el servidod.<br> Vuelva a intentarlo";
}
else{
    echo "Los datos no estan completos. Intentelo de nuevo";
}





