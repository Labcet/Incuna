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
            
            $('#macrofiltro').addClass("nav-item active");
        }

        function f_macro(cant_ideas){
            
            if(cant_ideas < 5){

                $("#respuesta").html('<div class="alert alert-danger" role="alert">Debe tener como mínimo 5 ideas registradas!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            } else {

                var url = "<?php echo base_url(); ?>EmprendedorController/PuntajeMacrofiltro";
                var allData = $('#form_macro').serialize();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: allData,
                    success: function(){

                        window.location.href = "<?php echo base_url(); ?>/EmprendedorController/IdeaShow";
                    }
                });
            }
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
                    <?php if($verificar === 0) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="respuesta"></div>
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Macrofiltro</h4>
                                    <p class="card-category">Con este primer filtro se busca conocer un poco más sobre las ideas registradas.  Las posibles respuestas son</p><br>
                                    <div class="row">
                                      <div class="col-md-4">A: Alto/Mucho.</div>
                                      <div class="col-md-4">B: Medio/Regular.</div>
                                      <div class="col-md-4">C: Algo/Poco.</div>
                                    </div><br>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>IDEA</th>
                                            <th>¿La idea me gusta y estoy motivado/a para ponerla en práctica?</th>
                                            <th>¿Existe un mercado potencial para este producto?</th>
                                            <th>¿Hay materias primas disponibles para fabricar este producto?</th>
                                            <th>¿Hay competencia?</th>
                                            <th>¿Permite este negocio tener ganancias?</th>
                                            <th>¿Es posible producir el producto o servicio en tu localidad?</th>
                                            <th>¿Se tiene fácil acceso a la tecnología?</th>
                                        </thead>
                                        <tbody>
                                            <form name="form_macro" id="form_macro" method="post">
                                            <?php 
                                                $cont = 1;
                                                foreach($ideas as $row): 
                                            ?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><?php echo $row->Titulo; ?></td>
                                                <?php echo 
                                                    '<td align="center">
                                                        <select name="r'.$row->Id.'_1">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>'
                                                ?>
                                                <?php echo 
                                                    '<td align="center">
                                                        <select name="r'.$row->Id.'_2">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>'
                                                ?>
                                                <?php echo 
                                                    '<td align="center">
                                                        <select name="r'.$row->Id.'_3">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>'
                                                ?>
                                                <?php echo 
                                                    '<td align="center">
                                                        <select name="r'.$row->Id.'_4">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>'
                                                ?>
                                                <?php echo 
                                                    '<td align="center">
                                                        <select name="r'.$row->Id.'_5">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>'
                                                ?>
                                                <?php echo 
                                                    '<td align="center">
                                                        <select name="r'.$row->Id.'_6">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>'
                                                ?>
                                                <?php echo 
                                                    '<td align="center">
                                                        <select name="r'.$row->Id.'_7">
                                                            <option value="5">A</option>
                                                            <option value="3">B</option>
                                                            <option value="1">C</option>
                                                        </select>
                                                    </td>'
                                                ?>
                                            </tr>
                                            <?php
                                                echo '<td><input type="text" name="total" value="'.$cont.'" hidden></td>';
                                                echo '<td><input type="text" name="id'.$cont.'" value="'.$row->Id.'" hidden></td>';
                                                $cont++;
                                                endforeach; 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col text-center">
                                <button class="btn btn-info btn-fill pull-right" type="button" name="siguiente" onclick="f_macro(<?php echo $cont-1; ?>);">Enviar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($verificar !== 0) : ?>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Ideas Seleccionadas</h4><br>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>TITULO DE LA IDEA</th>
                                            <th>DESCRIPCION</th>
                                            <th>PUNTAJE MACROFILTRO</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ideas as $row): ?>
                                            <tr>
                                                <td><?php echo $row->Id; ?></td>
                                                <td><?php echo $row->Titulo; ?></td>
                                                <td><?php echo $row->Descripcion; ?></td>
                                                <td align="center"><?php echo $row->PuntajeMacro; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
