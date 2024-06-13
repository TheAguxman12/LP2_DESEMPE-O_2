<?php
require('bd.php');
session_start();

$alert_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yuser = isset($_POST['yourUsername']) ? $_POST['yourUsername'] : '';
    $ypass = isset($_POST['yourPassword']) ? $_POST['yourPassword'] : '';

    $simple = $connection->prepare("SELECT * FROM USUARIOS WHERE usuario = :yourUsername");
    $simple->bindParam(":yourUsername", $yuser);
    $simple->execute();

    $resultado = $simple->fetch(PDO::FETCH_ASSOC);

      //var_dump($resultado); 
      //echo "Usuario: $yuser, Clave: $ypass";


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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>2do Desempeño</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Panel de Administración</span>
                </a>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Ingresa tu cuenta</h5>
                    <p class="text-center small">Ingresa tus datos de usuario y clave</p>
                  </div>

                  <?php if ($alert_message): ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $alert_message; ?>
                    </div>
                  <?php endif; ?>

                  <form class="row g-3 needs-validation" method="POST" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Usuario</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="yourUsername" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Ingresa tu usuario.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Clave</label>
                      <input type="password" name="yourPassword" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Ingresa tu clave</div>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>
