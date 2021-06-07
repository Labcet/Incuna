
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/assets_ini/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/assets_ini/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>/assets/assets_ini/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script type="text/javascript">

    window.onload = function() {
            
      $('#ideas').addClass("nav-item active");
    }

    function f_insertar_idea(){
      var url = "<?php echo base_url(); ?>/EmprendedorController/IdeaInsert";
      $.ajax({
          type: "POST",
          url: url,
          data: $("#form_idea").serialize(),
          success: function(data)
          {
            switch (data) {
              case 'EXITO':
                $("#respuesta").html('<div class="alert alert-success" role="alert">Se registró la idea correctamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                window.location.href = "<?php echo base_url(); ?>/EmprendedorController/IdeaShow";
                break;
              case 'ERROR_REGISTRO':
                $("#respuesta").html('<div class="alert alert-danger" role="alert">Error en el registro!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                break;
              default:
                $("#respuesta").html('<div class="alert alert-danger" role="alert">Debe llenar todos los campos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                break;
            }
          }
      });
    }

    </script>
</head>

<body>

  <div class="wrapper">
    <?php $this->load->view('emprendedor/sidebar');?>
    <div class="main-panel">
      <?php $this->load->view('emprendedor/navbar');?>
      <div class="content">
        <div class="container-fluid">
          <?php if($this->session->userdata('convocatoria') !== 0 && $verificar === 0) :  ?>
            <div class="row">
              <div class="col-md-12">
                <div id="respuesta"></div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Registrar Nueva Idea</h4>
                  </div>
                  <div class="card-body">
                    <form name="form_idea" id="form_idea" action="post">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nombre de Idea</label>
                            <input id="titulo" name="titulo" type="text" class="form-control"  placeholder="Titulo de Idea" value="">
                          </div>
                        </div> 
                      </div>                                        
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Descripción de Idea</label>
                            <textarea id="descripcion" name="descripcion" rows="4" cols="80" class="form-control" placeholder="Descripción" value=""></textarea>
                          </div>
                        </div>
                      </div>
                      <input type="button" name="" class="btn btn-info btn-fill pull-right" onclick="f_insertar_idea();"value="Agregar Idea">
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header ">
                  <h4 class="card-title">Ideas Registradas  </h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <th>N°</th>
                      <th>Convocatoria</th>
                      <th>Nombre del proyecto</th>
                      <th>Descripcion</th>
                    </thead>     
                    <tbody>
                    <?php
                      $count = 1; 
                      foreach($ideas as $row): 
                    ?>
                      <tr>
                          <td><?php echo $count; ?></td>
                          <td align="center"><?php echo $row->Convocatoria; ?></td>
                          <td><?php echo $row->Titulo; ?></td>
                          <td><?php echo $row->Descripcion; ?></td>
                      </tr>
                      <?php
                        $count++; 
                        endforeach; 
                      ?>
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
        $this->load->view('emprendedor/footer');
      ?>
    </div>
  </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!--  Chartist Plugin  -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/demo.js"></script>

</html>
