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
        <?php $this->load->view('administrador/sidebar');?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php $this->load->view('administrador/navbar');?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card text-white bg-danger">
                                <div class="card-header">
                                    <p align="center">N° ESTUDIANTES</p>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <h1 class="card-title" align="center"><strong><?php echo $num_estudiantes?></strong></h1>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-white bg-warning">
                                <div class="card-header">
                                    <p align="center">N° MENTORES</p>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <h1 class="card-title" align="center"><strong><?php echo $num_mentores?></strong></h1>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-white bg-success">
                                <div class="card-header">
                                    <p align="center">N° EVENTOS</p>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <h1 class="card-title" align="center"><strong><?php echo $num_eventos?></strong></h1>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card text-white bg-info">
                                <div class="card-header">
                                    <p align="center">N° CONVOCATORIAS</p>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <h1 class="card-title" align="center"><strong><?php echo $num_convocatorias?></strong></h1>
                                    <br>
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
