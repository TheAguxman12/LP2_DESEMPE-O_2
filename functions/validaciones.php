<?php
function Validar_Datos() {
    $vMensaje='';
    
    if (strlen($_POST['usuario']) < 3) {
        $vMensaje.='Debes ingresar un nombre con al menos 3 caracteres. <br />';
    }
    if (strlen($_POST['nombre']) < 3) {
        $vMensaje.='Debes ingresar un apellido con al menos 3 caracteres. <br />';
    }
    if (strlen($_POST['apellido']) < 5) {
        $vMensaje.='Debes ingresar un correo con al menos 5 caracteres. <br />';
    }

    if (strlen($_POST['clave']) ==0 ) {
        $vMensaje.='Debes ingresar la clave. <br />';
    }elseif ($_POST['clave'] != $_POST['ReClave']) {
        $vMensaje.='Las claves ingresadas deben coincidir. <br />';
    }
    
    if (empty($_POST['dni']) ) {
        $vMensaje.='Debes seleccionar tu pais. <br />';
    }
    if (empty($_POST['Sexo'])) {
        $vMensaje.='Debes seleccionar el sexo. <br />';
    }
    if (empty($_POST['Condiciones'])) {
        $vMensaje.='Debes aceptar los términos y condiciones para tu registro. <br />';
    }

    
    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }


    return $vMensaje;

}

?>