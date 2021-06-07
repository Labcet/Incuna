<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/assets_ini/img/apple-icon.png">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/assets_ini/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>INCUNA</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<!-- CSS Files -->
<link href="<?php echo base_url(); ?>/assets/assets_ini/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>/assets/assets_ini/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="<?php echo base_url(); ?>/assets/assets_ini/css/demo.css" rel="stylesheet" />

<script type="text/javascript">      

  window.onload = function() {
      
    $('#link_dashboard').addClass("nav-item active");
  }

</script>
</head>
<body>
<div class="wrapper">
  <div class="sidebar-wrapper">
        <?php $this->load->view('mentor/sidebar');?>
    </div> 
    <div class="main-panel">
      <?php $this->load->view('mentor/navbar');?>
      <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col">
              <div class="card" style="background-color: #FFF0F3;">
                <div class="card-header ">
                  <h4 class="card-title">Ideas a Evaluar</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <th>N°</th>
                      <th>Convocatoria</th>
                      <th>Nombre del proyecto</th>
                      <th>Descripcion</th>
                      <th>Canvas</th>
                      <?php foreach($ideas_asignadas as $row): ?>
                      <?php if($row->Estado == 1) :?>
                        <th></th>
                      <?php endif; ?>
                    </thead>     
                    <tbody>
                      <?php if($row->Estado == 1) :?>
                        <tr>
                            <?php echo '<input type="text" id="Idea" value="'.$row->Id.'" hidden>' ?>
                            <td><?php echo $row->Id; ?></td>
                            <td align="center"><?php echo $row->Convocatoria; ?></td>
                            <td><?php echo $row->Titulo; ?></td>
                            <td><?php echo $row->Descripcion; ?></td>
                            <?php echo '<td><a href="'.base_url().'MentorController/DescargaCanvas/'.$row->Id.'" class="btn btn-info btn-fill">Descargar PDF</a></td>' ?>
                            <?php if($row->Estado == 1) :?>
                              <td align="center">
                                <?php echo '<a href="'.base_url().'MentorController/AceptarIdea/'.$row->Id.'" class="btn btn-success btn-fill">&nbsp;Aceptar&nbsp;&nbsp;</a>' ?>
                                <p></p>
                                <?php echo '<a href="'.base_url().'MentorController/RechazarIdea/'.$row->Id.'" class="btn btn-danger btn-fill">Rechazar</a>' ?>
                              </td>
                            <?php endif; ?>
                        </tr>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card" style="background-color: #E9FFE3 ;">
                <div class="card-header ">
                  <h4 class="card-title">Ideas Aceptadas</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <th>N°</th>
                      <th>Convocatoria</th>
                      <th>Nombre del proyecto</th>
                      <th>Descripcion</th>
                      <th>Canvas</th>
                    </thead>     
                    <tbody>
                      <?php foreach($ideas_asignadas as $row): ?>
                        <?php if($row->Estado == 2) :?>
                          <tr>
                              <?php echo '<input type="text" id="Idea" value="'.$row->Id.'" hidden>' ?>
                              <td><?php echo $row->Id; ?></td>
                              <td align="center"><?php echo $row->Convocatoria; ?></td>
                              <td><?php echo $row->Titulo; ?></td>
                              <td><?php echo $row->Descripcion; ?></td>
                              <?php echo '<td><a href="'.base_url().'MentorController/DescargaCanvas/'.$row->Id.'" class="btn btn-info btn-fill">Descargar PDF</a></td>' ?>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> 
        </div>
        <!-- Footer -->
        <?php
            $this->load->view('mentor/footer');
        ?>
      </div>
    </div>
  </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-switch.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
</html>
