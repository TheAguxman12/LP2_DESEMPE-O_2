<?php

function Listar_camiones($connection) 
{
    
    $list_camiones = array();


    $SQL = "SELECT T.id_transporte, T.modelo, T.año_transporte, T.patente, T.disposicion, M.tipo_marca
            FROM TRANSPORTE T
            JOIN MARCA_TRANSPORTE M ON T.marca = M.id_marca";
    $stmt = $connection->prepare($SQL);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($result as $i => $data) {
        $list_camiones[$i]['ID_TRANSPORTE'] = $data['id_transporte'];
        $list_camiones[$i]['MODELO'] = $data['modelo'];
        $list_camiones[$i]['AÑO_TRANSPORTE'] = $data['año_transporte'];
        $list_camiones[$i]['PATENTE'] = $data['patente'];
        $list_camiones[$i]['DISPOSICION'] = $data['disposicion'] ? 'Disponible' : 'No Disponible';
        $list_camiones[$i]['TIPO_MARCA'] = $data['tipo_marca'];
    }

    return $list_camiones;
}

function Listar_choferes($connection)
{
    $sql = "SELECT id_usuario, nombre, apellido, dni FROM USUARIOS";
    $sm = $connection->prepare($sql);
    $sm->execute();
    $choferes = $sm->fetchAll(PDO::FETCH_ASSOC);

    $list_choferes = array();

    foreach ($choferes as $i => $data) {
        $list_choferes[$i]['ID_USUARIO'] = $data['id_usuario'];
        $list_choferes[$i]['NOMBRE'] = $data['nombre'];
        $list_choferes[$i]['APELLIDO'] = $data['apellido'];
        $list_choferes[$i]['DNI'] = $data['dni'];

    }

   
    return $list_choferes;
}

function Listar_destinos($connection)
{
    $sql = "SELECT id_destino, localidad FROM DESTINO";
    $sm = $connection->prepare($sql);
    $sm->execute();
    $destino = $sm->fetchAll(PDO::FETCH_ASSOC);

    $list_destino = array();

    foreach ($destino as $i => $data) {
        $list_destino[$i]['ID_DESTINO'] = $data['id_destino'];
        $list_destino[$i]['LOCALIDAD'] = $data['localidad'];

    }

   
    return $list_destino;

}

function Listado_operadores($connection)
{
    
}

?>
