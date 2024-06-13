<?php
include("./functions/header.php");

require_once('./functions/listado.php');

$alert_message = "";

//llamado a las funciones
$listado_camiones = Listar_camiones($connection);
$list_chof = Listar_choferes($connection);
$listado_destino = Listar_destinos($connection);
$list_opera = Listado_operadores($connection);


//carga de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifico
  if (
    !empty($_POST['chofer']) && !empty($_POST['transporte']) && !empty($_POST['destino'])
    && !empty($_POST['fecha']) && !empty($_POST['costo']) && isset($_POST['proc'])
  ) {

    

    $chofer = $_POST['chofer'];
    $trns = $_POST['transporte'];
    $fecha = $_POST['fecha'];
    $fecha_creacion = (new DateTime())->format('Y-m-d H:i:s');  // fecha actual
    $dest = $_POST['destino'];
    $operador = $_SESSION['user_id']; // Asumiendo que el operador es el usuario logueado
    $costo = $_POST['costo'];
    $porcentaje = $_POST['proc'];

    $SQL = "INSERT INTO VIAJES (chofer, camion, fecha_viaje, fecha_creacion, destino, operador, costos, porcentaje_chofer) 
              VALUES (:chofer, :camion, :fecha_viaje, :fecha_creacion, :destino, :operador, :costo, :porcentaje_chofer)";

    $stmt = $connection->prepare($SQL);
    $stmt->bindParam(':chofer', $chofer);
    $stmt->bindParam(':camion', $trns);
    $stmt->bindParam(':fecha_viaje', $fecha);
    $stmt->bindParam(':fecha_creacion', $fecha_creacion);
    $stmt->bindParam(':destino', $dest);
    $stmt->bindParam(':operador', $operador);
    $stmt->bindParam(':costo', $costo);
    $stmt->bindParam(':porcentaje_chofer', $porcentaje);

    if ($stmt->execute()) {
      $alert_message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            ¡Los datos se guardaron correctamente! 
                        </div>';
    } else {
      $alert_message = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle me-1"></i>
                            Ocurrió un error al guardar los datos.
                        </div>';
    }
  } else {
    $alert_message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        Los campos indicados con (*) son requeridos.
                    </div>';
  }
}
?>

<div class="pagetitle">
  <h1>Registrar un nuevo viaje</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Viajes</li>
      <li class="breadcrumb-item active">Carga</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ingresa los datos</h5>

          <?= $alert_message ?>

          <form method="POST" class="row g-3">
            <div class="col-12">
              <label for="chofer" class="form-label">Chofer</label>
              <select class="form-select" aria-label="Selector" id="chofer" name="chofer">
                <option value="">Seleccione el Chofer</option>
                <?php foreach ($list_chof as $chofer) : ?>
                  <option value="<?= htmlspecialchars($chofer['ID_USUARIO']); ?>">
                    <?= htmlspecialchars($chofer['NOMBRE'] . ' ' . $chofer['APELLIDO'] . ' (' . $chofer['DNI'] . ')'); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12">
              <label for="transporte" class="form-label">Transporte (*)</label>
              <select class="form-select" aria-label="Selector" id="transporte" name="transporte">
                <option value="">Seleccione el Transporte</option>
                <?php foreach ($listado_camiones as $camion) : ?>
                  <option value="<?= htmlspecialchars($camion['ID_TRANSPORTE']); ?>" >
                    <?= htmlspecialchars($camion['TIPO_MARCA'] . ' - ' . $camion['MODELO'] . ' - ' . $camion['PATENTE']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12">
              <label for="fecha" class="form-label">Fecha programada (*)</label>
              <input type="date" class="form-control" id="fecha" name="fecha" value="">
            </div>
            <div class="col-12">
              <label for="destino" class="form-label">Destino (*)</label>
              <select class="form-select" aria-label="Selector" id="destino" name="destino">
                <option value="">Seleccione el Destino</option>
                <?php foreach ($listado_destino as $dest) : ?>
                  <option value="<?= htmlspecialchars($dest['ID_DESTINO']); ?>" <?=$dest['ID_DESTINO']; ?>>
                    <?= htmlspecialchars($dest['LOCALIDAD']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12">
              <label for="costo" class="form-label">Costo (*)</label>
              <input type="number" class="form-control" id="costo" name="costo" value="">
            </div>


            <div class="col-12">
              <label for="proc" class="form-label">Porcentaje chofer (*)</label>
              <select class="form-select" id="proc" name="proc">
                <option value="">Seleccione el Porcentaje</option>
                <option value="15">15%</option>
                <option value="20">20%</option>
                <option value="30">30%</option>
              </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Registrar</button>
              <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
              <a href="index.html" class="text-primary fw-bold">Volver al index</a>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>



</body>

<!-- <script>
function calculatePercentage() {
  var costo = document.getElementById('costo').value;
  var porcentaje = costo * 0.15;
  document.getElementById('proc_display').value = porcentaje.toFixed(2);
  document.getElementById('proc').value = porcentaje.toFixed(2);
}
</script> -->

</html>