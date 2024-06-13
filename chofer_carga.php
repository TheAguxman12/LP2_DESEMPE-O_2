<?php
include("./functions/header.php");

$alert_message = "";

// traigo niveles de la bd
$sql = "SELECT id_nivel, tipo_nivel FROM NIVEL_USUARIO";
$sm = $connection->prepare($sql);
$sm->execute();
$lvls = $sm->fetchAll(PDO::FETCH_ASSOC);

// Envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifico 
    if (!empty($_POST['apellido']) && !empty($_POST['nombre']) && !empty($_POST['user']) 
       && !empty($_POST['dni']) && !empty($_POST['nivel']) && !empty($_POST['pass']) && !empty($_POST['anio'])) {

        $apellido = $_POST['apellido'];
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $usuario = $_POST['user'];
        $clave = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Usar hash para la clave
        $nivel = $_POST['nivel'];
        $anio = $_POST['anio'];
        if($_POST['nivel'] == 1){
            $imagen = "http://localhost/LP2_PARCIAL_2/assets/img/bellota.jpg";
        }elseif ($_POST['nivel'] == 2){
            $imagen = "http://localhost/LP2_PARCIAL_2/assets/img/burbuja.jpg";
        }elseif ($_POST['nivel'] == 3){
            $imagen = "http://localhost/LP2_PARCIAL_2/assets/img/bombon.jpg";
        }
        // Establecer un valor por defecto para la imagen

        $sql_insert = "INSERT INTO USUARIOS (usuario, nombre, apellido, dni, clave, actividad, nivel, fecha, imagen) 
                       VALUES (:usuario, :nombre, :apellido, :dni, :clave, 1, :nivel, :anio, :imagen)";
        $stmt = $connection->prepare($sql_insert);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':clave', $clave);
        $stmt->bindParam(':nivel', $nivel);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':imagen', $imagen);

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
    <h1>Registrar un nuevo chofer</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Transportes</li>
            <li class="breadcrumb-item active">Carga Chofer</li>
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
                            <label for="apellido" class="form-label">Apellido (*)</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="" required>
                        </div>
                        <div class="col-12">
                            <label for="nombre" class="form-label">Nombre (*)</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                        </div>
                        <div class="col-12">
                            <label for="dni" class="form-label">DNI (*)</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="" required>
                        </div>
                        <div class="col-12">
                            <label for="user" class="form-label">Usuario (*)</label>
                            <input type="text" class="form-control" id="user" name="user" value="" required>
                        </div>
                        <div class="col-12">
                            <label for="pass" class="form-label">Clave (*)</label>
                            <input type="password" class="form-control" id="pass" name="pass" required>
                        </div>
                        <div class="col-12">
                            <label for="anio" class="form-label">Fecha (*)</label>
                            <input type="date" class="form-control" id="anio" name="anio" value="" required>
                        </div>
                        <div class="col-12">
                            <label for="selector" class="form-label">Nivel (*)</label>
                            <select class="form-select" aria-label="Selector" id="selector" name="nivel" required>
                                <option value="">Seleccione Nivel de Accesibilidad</option>
                                <?php foreach ($lvls as $nivel) : ?>
                                    <option value="<?= htmlspecialchars($nivel['id_nivel']); ?>">
                                        <?= htmlspecialchars($nivel['tipo_nivel']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                            <a href="index.html" class="text-primary fw-bold">Volver al index</a>
                        </div>
                    </form>
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

