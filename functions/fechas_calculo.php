<?php
include("./functions/header.php");
require ('./functions/test_listado.php');

$fecha_creacion= $_[];
$Fecha_actual = date("Y-m-d"); 

//de esta manera sabemos cual es la fecha de mañana (sumamos un dia a hoy)
$Maniana= date("Y-m-d",strtotime($Fecha_actual."+ 1 day"));   

//con ambos datos, podemos preguntar si la fecha del viaje es mañana?
if ($Fecha_viaje == $Maniana){
    echo "El viaje es mañana!  <br /> Fecha viaje:  $Fecha_viaje  (mañana será $Maniana)"; 
}

//la fecha del viaje es para hoy?
if ($Fecha_viaje ==$Fecha_actual){
    echo "El viaje es hoy! <br /> Fecha viaje:  $Fecha_viaje  (hoy es $Fecha_actual)"; 
}
//la fecha del viaje es menor a hoy?
if ($Fecha_viaje < $Fecha_actual){
    echo "El viaje ya se hizo. <br /> Fecha viaje:  $Fecha_viaje  (hoy es $Fecha_actual)"; 
}