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
    
    <script>var base_url = '<?php echo base_url() ?>';</script>

    <script type="text/javascript">      
        
        window.onload = function() {
            
            $('#link_eventos').addClass("nav-item active");
        }

        function f_SaveEvento()
        {
            var url = "<?php echo base_url(); ?>/AdminController/SaveNewEvento";
            var formData = new FormData($("#form_profile")[0]);

            $.ajax(
            {                        
                type: "POST",                 
                url: url,                     
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                success: function(data)             
                {
                    switch (data) {
                        case 'EXITO':
                            $("#respuesta_nuevo_evento").html('<div class="alert alert-success" role="alert">Registrado exitosamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            window.location.href = "<?php echo base_url(); ?>AdminController/ShowEventos";
                            break;
                        case 'ERROR_INSERCION':
                            $("#respuesta_nuevo_evento").html('<div class="alert alert-danger" role="alert">Error al registrar!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                        case 'ERROR_ARCHIVO':
                            $("#respuesta_nuevo_evento").html('<div class="alert alert-danger" role="alert">Error al guardar la imagen!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                        case 'ERROR_SUBIDA':
                            $("#respuesta_nuevo_evento").html('<div class="alert alert-danger" role="alert">Error al subir la imagen!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                        default:
                            $("#respuesta_nuevo_evento").html('<div class="alert alert-danger" role="alert">Error en la validación!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                    }
                }
            });
        }

        function f_UpdateEvento()
        {
            var url = "<?php echo base_url(); ?>/AdminController/UpdateEvento";
            $.ajax(
            {                        
                type: "POST",                 
                url: url,                     
                data: $("#form_update_evento").serialize(),
                success: function(data)             
                {
                    switch (data) {
                        case 'EXITO':
                            $("#respuesta_actualizacion_evento").html('<div class="alert alert-success" role="alert">Registrado exitosamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            window.location.href = "<?php echo base_url(); ?>AdminController/ShowEventos";
                            break;
                        case 'ERROR_ACTUALIZACION':
                            $("#respuesta_actualizacion_evento").html('<div class="alert alert-danger" role="alert">Error al actualizar el evento!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                        default:
                            $("#respuesta_actualizacion_evento").html('<div class="alert alert-danger" role="alert">Error en la validación!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                    }
                }
            });
        }

    </script>
</head>

<body>
    
    <!-- UPDATE EVENTO MODAL -->
    <div class="modal fade bd-example-modal-lg" id="actualizaEventoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos del Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="respuesta_actualizacion_evento"></div>
                    <form name="form_update_evento" id="form_update_evento" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input type="text" name="update_titulo" id="update_titulo" class="form-control" value="">
                                    <input type="text" name="update_id" id="update_id" class="form-control" value="" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lugar</label>
                                    <input type="text" name="update_lugar" id="update_lugar" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Breve Descripción</label>
                                    <input type="text" name="update_descripcion" id="update_descripcion" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="date" name="update_fecha" id="update_fecha" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Imagen de Portada</label>
                                    <div class="form-group">
                                        <img id="update_portada" src="" alt="Imagen de Portada" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-6">
                                <button>Eliminar</button>
                            </div>-->
                        </div>
                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Imagen de Portada</label>
                                    <input type="file" name="portada" class="form-control" value="">
                                </div>
                            </div>
                        </div>-->
                        <input class="btn btn-info btn-fill pull-right" type="button" name="siguiente" value="Actualizar Datos" onclick="f_UpdateEvento();">
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- NUEVO EVENTO MODAL -->
    <div class="modal fade bd-example-modal-lg" id="nuevoEventoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div id="respuesta_nuevo_evento"></div>
                <form name="form_profile" id="form_profile" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" name="titulo" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lugar</label>
                                <input type="text" name="lugar" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" name="descripcion" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Imagen de Portada</label>
                                <input type="file" name="portada" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-info btn-fill pull-right" type="button" name="siguiente" value="Registrar" onclick="f_SaveEvento();">
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
                            <button type="button" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#nuevoEventoModal">
                                Nuevo Evento
                            </button>
                            <br><br>
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Eventos</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>N°</th>
                                            <th>Título</th>
                                            <th>Lugar</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </thead>     
                                        <tbody>
                                            <?php
                                                $count = 1; 
                                                foreach($eventos as $row): 
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row->Titulo; ?></td>
                                                <td><?php echo $row->Lugar; ?></td>
                                                <td><?php echo $row->Descripcion; ?></td>
                                                <td><?php echo $row->Fecha; ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#actualizaEventoModal" 
                                                        data-id="<?php echo $row->Id; ?>"
                                                        data-titulo="<?php echo $row->Titulo; ?>"
                                                        data-lugar="<?php echo $row->Lugar; ?>"
                                                        data-descripcion="<?php echo $row->Descripcion; ?>"
                                                        data-fecha="<?php echo $row->Fecha; ?>"
                                                        data-portada="<?php echo $row->Portada; ?>"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#FF5733" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo '<a href="'.base_url("AdminController/DeleteEvento/".$row->Id).'"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="indianred" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                </svg></a>'?>
                                                </td>
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
            var portada = base_url+'eventos_img/'+button.data('portada');
            //var portada = button.data('portada');
            var modal = $(this);
            modal.find('#update_id').val(id);
            modal.find('#update_titulo').val(titulo);
            modal.find('#update_lugar').val(lugar);
            modal.find('#update_descripcion').val(descripcion);
            modal.find('#update_fecha').val(fecha);
            modal.find('#update_portada').attr("src", portada);
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
