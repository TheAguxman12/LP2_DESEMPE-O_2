<?php
include ('../bd.php');
require_once('listado.php');

$listado_camiones = Listar_camiones($connection);
$cantidad = count($listado_camiones);?>
<div class="pagetitle">
    <h1>Lista de viajes registrados</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Viajes</li>
            <li class="breadcrumb-item active">Listado</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Viajes cargados</h5>

                    <!-- Default Table -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">marca</th>
                                <th scope="col">modelo</th>
                                <th scope="col">año</th>
                                <th scope="col">patente</th>
                                <th scope="col">disposicion</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            <?php for ($i = 0; $i < $cantidad; $i++) { ?>
                                <tr>
                                    <td><?php echo $listado_camiones[$i]['ID_TRANSPORTE']; ?></td>
                                    <td><?php echo $listado_camiones[$i]['MODELO']; ?></td>
                                    <td><?php echo $listado_camiones[$i]['AÑO_TRANSPORTE']; ?></td>
                                    <td><?php echo $listado_camiones[$i]['PATENTE']; ?></td>
                                    <td><?php echo $listado_camiones[$i]['DISPOSICION']; ?></td>
                                    <td><?php echo $listado_camiones[$i]['TIPO_MARCA']; ?></td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <!-- End Default Table Example -->


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