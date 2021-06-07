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
            
            $('#link_mentores').addClass("nav-item active");
        }

        function f_SaveMentor()
        {
            var url = "<?php echo base_url(); ?>/AdminController/SaveNewMentor";
            $.ajax(
            {                        
                type: "POST",                 
                url: url,                     
                data: $("#form_profile").serialize(),
                success: function(data)             
                {
                    switch (data) {
                        case 'EXITO':
                            $("#respuesta").html('<div class="alert alert-success" role="alert">Datos registrados correctamente!</div>');
                            window.location.href = "<?php echo base_url(); ?>AdminController/ShowMentores";
                            break;
                        case 'ERROR_INSERCION':
                            $("#respuesta").html('<div class="alert alert-danger" role="alert">Error en el registro!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                        case 'ERROR_EXISTENCIA':
                            $("#respuesta").html('<div class="alert alert-danger" role="alert">Ya existe un mentor con ese usuario!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                        default:
                            $("#respuesta").html('<div class="alert alert-danger" role="alert">Error en la validación!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                    }
                }
            });
        }

        function f_DeleteMentor($id_mentor)
        {
            window.location.href = "<?php echo base_url(); ?>/AdminController/DeleteMentor";
        }

    </script>
</head>

<body>
    
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="nuevoMentorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Mentor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div id="respuesta"></div>
                <form name="form_profile" id="form_profile" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>DNI</label>
                                <input type="text" name="dni" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Código</label>
                                <input type="text" name="codigo" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" name="celular" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" name="paterno" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" name="materno" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" name="usuario" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="direccion" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Acerca de Mi</label>
                                <input type="text" name="descripcion" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-info btn-fill pull-right" type="button" name="siguiente" value="Registrar" onclick="f_SaveMentor();">
                    <div class="clearfix"></div>
                </form>
                </div>
            </div>
        </div>
    </div>

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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#nuevoMentorModal">
                                Nuevo Mentor
                            </button>
                            <br><br>
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Mentores</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>A. Paterno</th>
                                            <th>A. Materno</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Dirección</th>
                                            <th>Acción</th>
                                        </thead>     
                                        <tbody>
                                            <?php
                                                $count = 1; 
                                                foreach($mentores as $row): 
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row->Nombre; ?></td>
                                                <td><?php echo $row->Paterno; ?></td>
                                                <td><?php echo $row->Materno; ?></td>
                                                <td><?php echo $row->Email; ?></td>
                                                <td><?php echo $row->Celular; ?></td>
                                                <td><?php echo $row->Direccion; ?></td>
                                                <td><?php echo '<a href="'.base_url("AdminController/DeleteMentor/".$row->Id).'"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="indianred" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                </svg></a>'?></td>
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
