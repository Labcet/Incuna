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
            
            $('#link_logs').addClass("nav-item active");
        }

    </script>
</head>

<body>

    <div class="wrapper">
        <?php $this->load->view('administrador/sidebar');?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php $this->load->view('administrador/navbar');?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Logs</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Id</th>
                                            <th>Usuario</th>
                                            <th>Actividad</th>
                                            <th>Controlador</th>
                                            <th>Fecha</th>
                                        </thead>     
                                        <tbody>
                                            <?php
                                                $count = 1; 
                                                foreach($logs as $row): 
                                            ?>
                                            <tr>
                                                <td><?php echo $row->Id; ?></td>
                                                <td><?php echo $row->Usuario; ?></td>
                                                <td><?php echo $row->Actividad; ?></td>
                                                <td><?php echo $row->Controlador; ?></td>
                                                <td><?php echo $row->Timestamp; ?></td>
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
              $this->load->view('administrador/footer');
            ?>

        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>

<script>
    $(function(){
        $('#actualizaEventoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var titulo = button.data('titulo');
            var lugar = button.data('lugar');
            var descripcion = button.data('descripcion');
            var fecha = button.data('fecha');
            var modal = $(this);
            modal.find('#update_id').val(id);
            modal.find('#update_titulo').val(titulo);
            modal.find('#update_lugar').val(lugar);
            modal.find('#update_descripcion').val(descripcion);
            modal.find('#update_fecha').val(fecha);
        });
    });
</script>

<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-switch.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

</html>
