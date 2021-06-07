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
        
        window.onload = function() {
            
            $('#microfiltro').addClass("nav-item active");
        }

        function f_micro(){
            
            var url = "<?php echo base_url(); ?>EmprendedorController/PuntajeMicrofiltro";
            var allData = $('#form_micro').serialize();

            $.ajax({
                type: 'POST',
                url: url,
                data: allData,
                success: function(data){

                    if(data == 'EXITO'){

                        window.location.href = "<?php echo base_url(); ?>/EmprendedorController/Microfiltro";
                    }
                }
            });
         }

         function f_canvas(){

            var url = "<?php echo base_url(); ?>EmprendedorController/GuardarCanvas";
            var formData = new FormData($("#canvas_form")[0]);

             $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                success: function(data){
                    
                    switch (data) {
                        case 'EXITO':
                            $("#respuesta").html('<div class="alert alert-success" role="alert">Se subió el archivo correctamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            window.location.href = "<?php echo base_url(); ?>/EmprendedorController/Microfiltro";
                            break;
                        case 'ERROR_MENTOR':
                            $("#respuesta").html('<div class="alert alert-danger" role="alert">Error al asignar un mentor!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                        default:
                            $("#respuesta").html('<div class="alert alert-danger" role="alert">Error en la subida del archivo!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            break;
                    }
                }
             });
         }

    </script>

</head>

<body>
    <div class="wrapper">
        <form action="#" id="macroF">
            <input type="hidden" name="id" value="id1">
            <input type="hidden" name="campo" value="campo1">
            <input type="hidden" name="value" value="value1">
        </form>
        <?php $this->load->view('emprendedor/sidebar');?>
        <div class="main-panel">
            <?php $this->load->view('emprendedor/navbar');?>
            <div class="content" id="content">
                <div class="container-fluid">
                    <?php if($ideas === 0) : ?>
                        <div class="card text-white bg-danger mb-3">
                        <div class="card-header">
                            <strong>IMPORTANTE</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Primero debe realizar el macrofiltro.</p>
                        </div>
                        </div>
                    <?php endif; ?>
                    <?php if($ideas !== 0 && $verificar === 0) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Microfiltro</h4>
                                    <p class="card-category">Este segundo filtro te ayudará a seleccionar la idea más acertada y posiblemente exitosa.  Las posibles respuestas son</p><br>
                                    <div class="row">
                                      <div class="col-md-4">A: Alto/Mucho.</div>
                                      <div class="col-md-4">B: Medio/Regular.</div>
                                      <div class="col-md-4">C: Algo/Poco.</div>
                                    </div><br>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th align="center">Criterios</th>
                                            <?php foreach($ideas as $row): ?>
                                            <th><?php echo $row->Titulo ?></th>
                                            <?php endforeach; ?>
                                        </thead>
                                        <tbody>
                                        <form name="form_micro" id="form_micro" method="post">
                                            <tr>
                                                <td>¿Existen canales de comercialización establecidos para este producto o servicio?</td>
                                                <?php 
                                                    $cont = 1;
                                                    foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_1">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    echo '<input type="text" name="id'.$cont.'" value="'.$row->Id.'" hidden>';
                                                    $cont++;
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Cuál es el grado de dificultad en la elaboración del producto o servicio?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_2">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Se cuenta con las herramientas o equipos necesarios?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_3">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Se cuenta con los recursos económicos para llevarlo a cabo?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_4">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Se puede conseguir un crédito para iniciar el negocio?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_5">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Se cuenta con la capacidad de calcular los costos y fijar el precio?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_6">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Realmente la idea nos gusta y estamos dispuestos(as) a apostar por el negocio?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_7">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Se cuenta con alguna experiencia previa en el giro del negocio?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_8">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Se cuenta con una red de contactos que potencien el negocio?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_9">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                                <td>¿Existe disponibilidad de mano de obra calificada?</td>
                                                <?php foreach($ideas as $row){
                                                    echo '<td align="center">
                                                        <select name="r'.$row->Id.'_10">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>';
                                                    }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col text-center">
                                <button class="btn btn-info btn-fill pull-right" type="button" name="siguiente" onclick="f_micro();">Enviar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($ideas !== 0 && $verificar !== 0) : ?>
                        <div class="row">
                        <div class="col-md-12">
                            <div id="respuesta"></div>
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Idea Ganadora</h4><br>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>TITULO DE LA IDEA</th>
                                            <th>DESCRIPCION</th>
                                            <?php if($estado === 0) : ?>
                                                <th>PUNTAJE MICROFILTRO</th>
                                                <th>CANVAS (PDF)</th>
                                            <?php else : ?>
                                                <th>ESTADO </th>
                                            <?php endif; ?>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ideas as $row): ?>
                                            <form name="canvas_form" id="canvas_form" method="post" enctype="multipart/form-data">
                                            <tr>
                                                <?php echo '<input type="text" name="IdeaId" value="'.$row->Id.'" hidden>'?>
                                                <td><?php echo $row->Id; ?></td>
                                                <td><?php echo $row->Titulo; ?></td>
                                                <td><?php echo $row->Descripcion; ?></td>
                                                <?php if($estado === 0) : ?>
                                                    <td align="center"><?php echo $row->PuntajeMicro; ?></td>
                                                    <td><input type="file" name="archivo_canvas"></td>
                                                <?php elseif($estado === 1) : ?>
                                                    <td style="color: orange;"><strong>Enviado</strong></td>
                                                <?php elseif($estado === 2) : ?>
                                                    <td style="color: green;"><strong>Aceptado</strong></td>
                                                    <!--<td style="color: green;"><strong>Aceptado</strong></td>-->
                                                <?php else : ?>
                                                    <td style="color: red;"><strong>Rechazado</strong></td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php if($estado === 0) : ?>
                                        <div class="col text-centered" align="center">
                                            <button type="button" class="btn btn-info btn-fill" onclick="f_canvas();">Enviar a Evaluacion</button>
                                        </div>
                                    <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
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
