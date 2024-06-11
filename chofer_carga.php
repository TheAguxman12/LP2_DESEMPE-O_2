<?php
include("./functions/header.php");
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
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    Los campos indicados con (*) son requeridos
                </div>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Mensajes de Alerta por validaciones
                </div>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Los datos se guardaron correctamente! 
                </div>

                <form class="row g-3">
                
                <div class="col-12">
                    <label for="Apellido" class="form-label">Apellido (*)</label>
                    <input type="text" class="form-control" id="apellido">
                </div>

                <div class="col-12">
                    <label for="Nombre" class="form-label">Nombre (*)</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                
                <div class="col-12">
                    <label for="dni" class="form-label">DNI (*)</label>
                    <input type="text" class="form-control" id="dni">
                </div>
                <div class="col-12">
                    <label for="user" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="user">
                </div>
                <div class="col-12">
                    <label for="pass" class="form-label">Clave</label>
                    <input type="text" class="form-control" id="pass">
                </div>

                <div class="text-center">
                    <button class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar Campos</button>
                    <a href="index.html" class="text-primary fw-bold">Volver al index</a>
                </div>
                </form>

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
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <!-- <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>-->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script> 
  
  <!--<script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>