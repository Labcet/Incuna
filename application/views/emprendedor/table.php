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
            
            $('#link_test').addClass("nav-item active");
        }

        function f_test(){

            var url = "<?php echo base_url(); ?>/EmprendedorController/ValidarTest";
            $.ajax({                        
                type: "POST",                 
                url: url,                     
                data: $("#datos").serialize(),
                success: function(data)             
                {
                    var url = "<?php echo base_url(); ?>/EmprendedorController/ResultadoTest";
                    $('#content').load(url);
                }
            });
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
            <div class="content" id="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Primer Test para evaluar la capacidad emprendedora</h4>
                                    <p class="card-category">Con  éste  test  pretendemos  ayudarte  a  que  analices  tu  capacidad  Emprendedora.  Las posibles respuestas son</p><br>
                                        <div class="inline-block pb-3">
                                            <li style="list-style:none; text-align: left;">A: Sí / en total acuerdo.</li>
                                            <li style="list-style:none; text-align: left;">B: Bastante / a menudo. </li>
                                            <li style="list-style:none; text-align: left;">C: Algo / alguna vez. </li>
                                            <li style="list-style:none; text-align: left;">D: No / en absoluto.</li>
                                        </div>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>PREGUNTA</th>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                        </thead>
                                        <tbody>
                                            <form name="datos" id="datos" method="post">
                                            <?php foreach($query as $row): ?>
                                            <tr>
                                                <td><?php echo $row->Id; ?></td>
                                                <td><?php echo $row->Pregunta; ?></td>
                                                <?php echo '<td><input type="radio" name="r'.$row->Id.'"  value="5" checked></td>'?>
                                                <?php echo '<td><input type="radio" name="r'.$row->Id.'"  value="4"></td>'?>
                                                <?php echo '<td><input type="radio" name="r'.$row->Id.'"  value="3"></td>'?>
                                                <?php echo '<td><input type="radio" name="r'.$row->Id.'"  value="2"></td>'?>
                                            </tr>
                                            <?php endforeach; ?>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col text-center">
                                <input class="btn btn-info btn-fill" type="submit" value="Enviar Respuestas" onclick="f_test();">
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
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!--  Chartist Plugin  -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>/assets/assets_ini/js/demo.js"></script>

</html>
