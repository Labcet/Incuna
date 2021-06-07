<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/assets_ini/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/assets_ini/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>INCUNA</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>/assets/assets_ini/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/assets_ini/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <script type="text/javascript">      

        window.onload = function() {
            
            $('#link_dashboard').addClass("nav-item active");
        }

    </script>
</head>

<body>
    
    <div class="wrapper">
        <?php $this->load->view('emprendedor/sidebar');?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php $this->load->view('emprendedor/navbar');?>
            <!-- End Navbar -->
            <?php if($this->session->userdata('convocatoria') === 0) : ?>
              <div class="content">
                <div class="container-fluid">
                  <div class="card">
                    <div class="card-header ">
                      <h4 class="card-title">Convocatorias</h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                      <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                          <th scope="col">N°</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Fecha de Inicio</th>
                          <th scope="col">Fecha de Fin</th>
                          <th scope="col"></th>
                        </thead>     
                        <tbody>
                        <?php foreach($info as $row): ?>
                          <tr>
                              <td><?php echo $row->Id; ?></td>
                              <td><?php echo $row->Titulo; ?></td>
                              <td><?php echo $row->Descripcion; ?></td>
                              <td><?php echo date('Y/m/d',strtotime($row->Fecha_ini)); ?></td>
                              <td><?php echo date('Y/m/d',strtotime($row->Fecha_fin)); ?></td>
                              <?php if ($row->Fecha_ini <= date('Y-m-d') && $row->Fecha_fin >= date('Y-m-d')) : ?>
                                <td><a href="<?php echo base_url().'EmprendedorController/InscripcionConvocatoria/'.$row->Id;?>" class="btn btn-info btn-fill">Inscribirme</a></td>
                              <?php else : ?>
                                <td align="center" style="color: red;"><strong>Finalizado</strong></td>
                              <?php endif; ?>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <!-- INDICACIONES AL INSCRITO -->
            
            <?php if($this->session->userdata('convocatoria') !== 0) : ?>
              <div class="content">
                <div class="container-fluid">
                  <div class="card">
                    <div class="card-header ">
                      <h4 class="card-title">Indicaciones</h4>
                    </div>
                    <div class="card-body table-responsive">
                      <p>Genial, ahora ya estás participando de la convocatoria. Usa tu creatividad para plantear un emprendimiento que pueda generar valor tanto económico como social, éxitos!</p>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <h5 class="text-success"><strong>Paso 1</strong></h5>
                          <p>Registre como mínimo 5 ideas en la opción "MIS IDEAS".</p>
                        </li>
                        <li class="list-group-item">
                          <h5 class="text-success"><strong>Paso 2</strong></h5>
                          <p>Una vez registradas las 5 ideas, debe ir a "MACROFILTRO" para responder las preguntas según cada idea y de esta forma el sistema seleccionará las 4 ideas con mayor probabilidad de éxito.</p>
                        </li>
                        <li class="list-group-item">
                          <h5 class="text-success"><strong>Paso 3</strong></h5>
                          <p>Ahora que solo cuenta con 4 ideas del filtro anterior, en el "MICROFILTRO" se evaluarán dichas ideas de tal forma que solo quede una idea ganadora al final.</p>
                        </li>
                        <li class="list-group-item">
                          <h5 class="text-success"><strong>Paso 4</strong></h5>
                          <p>Finalmente, debe subir el lienzo canvas en formato PDF para posteriormente enviarlo a evaluación.</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <!-- Footer -->
            <?php
              $this->load->view('emprendedor/footer');
            ?>

        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

</html>
