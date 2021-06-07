<!DOCTYPE html>
<html lang="en">

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
        
        window.onload = function() 
        {
            $('#link_perfil').addClass("nav-item active");
        }

        function f_PerfilUpdate()
        {
            var url = "<?php echo base_url(); ?>/AdminController/PerfilUpdate";
            $.ajax(
            {                        
                type: "POST",                 
                url: url,                     
                data: $("#form_profile").serialize(),
                success: function(data)             
                {
                    switch (data) {
                        case 'EXITO':
                            $("#respuesta").html('<div class="alert alert-success" role="alert">Datos actualizados correctamente!</div>');
                            window.location.href = "<?php echo base_url(); ?>AdminController/PerfilShow";
                            break;
                        case 'ERROR_ACTUALIZACION':
                            $("#respuesta").html('<div class="alert alert-danger" role="alert">Error en la actualización!</div>');
                            break;
                        default:
                        $("#respuesta").html('<div class="alert alert-success" role="alert">Error en la validación!</div>');
                            break;
                    }
                }
            });
        }
    </script>

</head>

<body>
    <div class="wrapper">
        <?php $this->load->view('administrador/sidebar');?>
        <div class="main-panel">
            <?php $this->load->view('administrador/navbar');?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="respuesta"></div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editar Perfil</h4>
                                </div>
                                <div class="card-body">
                                    <form name="form_profile" id="form_profile" method="post">
                                        <?php foreach($rid as $val):?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>DNI</label>
                                                    <?php echo '<input type="text" name="dni" class="form-control" disabled="" value="'.$val->Dni.'">'?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Código</label>
                                                    <?php echo '<input type="text" name="codigo" class="form-control" disabled="" value="'.$val->Codigo.'">'?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Celular</label>
                                                    <?php echo '<input type="text" name="celular" class="form-control" placeholder="Celular" value="'.$val->Celular.'">'?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <?php echo '<input type="text" name="nombre" class="form-control" placeholder="Company" value="'.$val->Nombre.'">'?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Apellido Paterno</label>
                                                    <?php echo '<input type="text" name="paterno" class="form-control" placeholder="Company" value="'.$val->Paterno.'">'?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Apellido Materno</label>
                                                    <?php echo '<input type="text" name="materno" class="form-control" placeholder="Company" value="'.$val->Materno.'">'?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <?php echo '<input type="text" name="usuario" class="form-control" disabled="" placeholder="Company" value="'.$val->Usuario.'">'?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <?php echo '<input type="text" name="email" class="form-control" placeholder="Email" value="'.$val->Email.'">'?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <?php echo '<input type="text" name="direccion" class="form-control" placeholder="Dirección" value="'.$val->Direccion.'">'?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Acerca de Mi</label>
                                                    <?php echo '<input type="text" name="descripcion" class="form-control" placeholder="Escribe acerca de tí" value="'.$val->Descripcion.'">'?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                        <input class="btn btn-info btn-fill pull-right" type="button" name="siguiente" value="Actualizar" onclick="f_PerfilUpdate();">
                                        <div class="clearfix"></div>
                                    </form>
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
