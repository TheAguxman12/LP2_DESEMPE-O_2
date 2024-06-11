<?php 

require('../bd.php');
function recuperar_usuarios() {
    global $connection;

    $usuarios = array();

    try {
        
        $sql = "SELECT * FROM USUARIOS";
        $stmt = $connection->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = $row;
        }
        $stmt = exit;

    } catch (PDOException $f) {
        echo "Error: " . $f->getMessage();
    }
    return $usuarios;
}

