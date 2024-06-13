<?php

function listado($connection, $user_id)
{
    $list_viajes = array();

    // Determinar si se debe aplicar el filtro por user_id
    $filtro_admin = $_SESSION['nivel'] < 2;  // Cambiar la condición según sea necesario

    // Consulta SQL para obtener los viajes
    $sql = "SELECT 
                v.id_viaje AS id_viaje,
                v.fecha_viaje AS fecha_viaje,
                d.localidad AS destino,
                CONCAT(t.marca, ' - ', t.modelo, ' - ', t.patente) AS camion,
                CONCAT(u.apellido, ', ', u.nombre) AS chofer,
                v.costos AS costo_viaje,
                CONCAT('$ ', FORMAT(v.costos * v.porcentaje_chofer / 100, 2)) AS monto_chofer,
                v.porcentaje_chofer
            FROM 
                VIAJES v
                INNER JOIN DESTINO d ON v.destino = d.id_destino
                INNER JOIN TRANSPORTE t ON v.camion = t.id_transporte
                INNER JOIN USUARIOS u ON v.chofer = u.id_usuario";

    if ($filtro_admin) {
        $sql .= " WHERE v.chofer = :user_id";
    }

    $sql .= " AND v.fecha_viaje >= CURDATE() - INTERVAL 1 MONTH  -- Ejemplo: solo viajes del último mes
              ORDER BY v.fecha_viaje DESC";

    // Preparar la consulta
    $stmt = $connection->prepare($sql);

    if ($filtro_admin) {
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    }

    $stmt->execute();

    // Obtener resultados como un array asociativo
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Procesar los resultados
    foreach ($result as $i => $data) {
        $list_viajes[$i]['id_viaje'] = $data['id_viaje'];
        $list_viajes[$i]['fecha_viaje'] = $data['fecha_viaje'];
        $list_viajes[$i]['destino'] = $data['destino'];
        $list_viajes[$i]['camion'] = $data['camion'];
        $list_viajes[$i]['chofer'] = $data['chofer'];
        $list_viajes[$i]['costo_viaje'] = $data['costo_viaje'];
        $list_viajes[$i]['monto_chofer'] = $data['monto_chofer'];
        $list_viajes[$i]['porcentaje_chofer'] = $data['porcentaje_chofer'];
    }

    return $list_viajes;
}



