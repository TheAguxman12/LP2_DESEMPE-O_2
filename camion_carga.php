<?php
include("./functions/header.php");


$alert_message = "";

// traigo marcas de la bd
$sql = "SELECT id_marca, tipo_marca FROM MARCA_TRANSPORTE";
$sm = $connection->prepare($sql);
$sm->execute();
$marcas = $sm->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // VERIFICP
    if (!empty($_POST['marca']) && !empty($_POST['modelo']) && !empty($_POST['anio']) && !empty($_POST['patente'])) {

        $marca_tr = $_POST['marca'];
        $modelo_tr = $_POST['modelo'];
        $año_tr = $_POST['anio'];
        $patente_tr = $_POST['patente'];
        $dispo_tr = isset($_POST['dispo']) ? 'Disponible' : 'No Disponible'; // disponibilidad

      
        $sql_tr = "INSERT INTO TRANSPORTE (marca, modelo, año_transporte, patente, disposicion) 
                   VALUES (:marca, :modelo, :anio, :patente, :dispo)";

        $sm_tr = $connection->prepare($sql_tr);
        $sm_tr->bindParam(':marca', $marca_tr);
        $sm_tr->bindParam(':modelo', $modelo_tr);
        $sm_tr->bindParam(':anio', $año_tr);
        $sm_tr->bindParam(':patente', $patente_tr);
        $sm_tr->bindParam(':dispo', $dispo_tr);

        if ($sm_tr->execute()) {
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
    <h1>Registrar un nuevo transporte</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Transportes</li>
            <li class="breadcrumb-item active">Carga Camión</li>
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

                    <!-- FORMULARIO -->
                    <form method="POST" class="row g-3">
                        <div class="col-12">
                            <label for="selector" class="form-label">Marca (*)</label>
                            <select class="form-select" aria-label="Selector" id="selector" name="marca">
                                <option selected="">Selecciona una opción</option>
                                <?php foreach ($marcas as $marca) : ?>
                                    <option value="<?= $marca['id_marca']; ?>"><?= $marca['tipo_marca']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="modelo" class="form-label">Modelo (*)</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>

                        <div class="col-12">
                            <label for="año" class="form-label">Año (*)</label>
                            <input type="number" class="form-control" id="anio" name="anio" min="1900" max="2024"required>
                        </div>
                        <div class="col-12">
                            <label for="patente" class="form-label">Patente (*)</label>
                            <input type="text" class="form-control" id="patente" name="patente" minlength="6" maxlength="7" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Disponibilidad</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="dispo">
                                <label class="form-check-label" for="gridCheck1"> Habilitado</label>
                            </div>
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


<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>