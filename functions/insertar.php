<?php 
function InsertarUsuarios($vConexion){
    
    $SQL_Insert="INSERT INTO Usuarios (Nombre, Apellido, Email, Clave, IdNivel, IdPais, FechaCreacion, Sexo)
    VALUES ('".$_POST['Nombre']."' , '".$_POST['Apellido']."' , '".$_POST['Email']."', '".$_POST['Clave']."' , 2, ".$_POST['Pais']." , NOW(), '".$_POST['Sexo']."')";


    if (!mysqli_query($vConexion, $SQL_Insert)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
?>


<?php
function InsertarViaje($connection) {
    

    $SQL_Insert = "INSERT INTO VIAJES (chofer, camion, fecha_viaje, fecha_creacion, destino, encargado)
                   VALUES (:chofer, :camion, :fecha_viaje, NOW(), :destino, :encargado)";


    $stmt = $connection->prepare($SQL_Insert);



    $stmt->bindParam(':chofer', $_POST['chofer']);
    $stmt->bindParam(':camion', $_POST['camion']);
    $stmt->bindParam(':fecha_viaje', $_POST['fecha_viaje']);
    $stmt->bindParam(':destino', $_POST['destino']);
    $stmt->bindParam(':encargado', $_POST['encargado']);


    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        die('<h4>eror: ' . $e->getMessage() . '</h4>');
    }
}
?>
