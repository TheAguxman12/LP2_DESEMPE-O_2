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

// Ejemplo de uso:
$usuarios = recuperar_usuarios();

// Ahora puedes hacer lo que quieras con los datos de los usuarios, por ejemplo, imprimirlos:
foreach ($usuarios as $usuario) {
    echo "ID: " . $usuario['id'] . ", Nombre: " . $usuario['nombre'] . ", Email: " . $usuario['email'] . "<br>";
}
?>
