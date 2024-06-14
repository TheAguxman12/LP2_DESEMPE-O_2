<?php
include('./bd.php');
session_start();

function logear ($connection,$user, $pass)
{
    $alert_message = "";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $yuser = $user;
      $ypass = $pass;

      $simple = $connection->prepare("SELECT * FROM USUARIOS WHERE usuario = :yourUsername");
      $simple->bindParam(":yourUsername", $yuser);
      $simple->execute();

      $resultado = $simple->fetch(PDO::FETCH_ASSOC);

      //var_dump($resultado); 
      //echo "Usuario: $yuser, Clave: $ypass";

    if($resultado){
      if($resultado['actividad'] == 1){
        if ($resultado && password_verify($ypass, $resultado['clave'])) {
            $_SESSION['user_id'] = $resultado['id_usuario'];
            $_SESSION['yuser'] = $resultado['usuario'];
            $_SESSION['nivel'] = $resultado['nivel'];
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['apellido'] = $resultado['apellido'];
            $_SESSION['foto'] = $resultado['imagen'];
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit();
        } else {
          $alert_message = '<div class="alert alert-danger" role="alert">El usuario y/o contraseña son incorrectos</div>';
        }
      }else{
        $alert_message = '<div class="alert alert-danger" role="alert">El usuario no se encuentra activo</div>';
      }
    }else{
        $alert_message = '<div class="alert alert-danger" role="alert">El usuario no se encuentra registrado</div>';
    }
  }
  return $alert_message;

}

