<link href="<?php echo base_url(); ?>/assets/assets_ini/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

<div class="sidebar" data-image="<?php echo base_url(); ?>/assets/assets_ini/img/sidebar-5.jpg" data-color="green">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo text-center" >
                    <h4>Bienvenido(a) <?php echo $uname?></h4>
                </div>
                <ul class="nav">
                    <li id="link_dashboard">
                        <a class="nav-link" href="<?php echo base_url(); ?>AdminController/Enter">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li id="link_perfil">
                        <a class="nav-link" href="<?php echo base_url(); ?>AdminController/PerfilShow">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Perfil</p>
                        </a>
                    </li>
                    <?php if($rol != 'editor'): ?>
                        <li id="link_mentores">
                            <a class="nav-link" href="<?php echo base_url(); ?>AdminController/ShowMentores">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>Mentores</p>
                            </a>
                        </li>
                    <li id="link_estudiantes">
                        <a class="nav-link" href="<?php echo base_url(); ?>AdminController/ShowEstudiantes">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Estudiantes</p>
                        </a>
                    </li>
                    <li id="link_administradores">
                        <a class="nav-link" href="<?php echo base_url(); ?>AdminController/ShowAdministradores">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Administradores</p>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li id="link_eventos">
                        <a class="nav-link" href="<?php echo base_url(); ?>AdminController/ShowEventos">
                            <i class="nc-icon nc-badge"></i>
                            <p>Eventos</p>
                        </a>
                    </li>
                    <li id="link_convocatorias">
                        <a class="nav-link" href="<?php echo base_url(); ?>AdminController/ShowConvocatorias">
                            <i class="nc-icon nc-attach-87"></i>
                            <p>Convocatorias</p>
                        </a>
                    </li>
                    <li id="link_logs">
                        <a class="nav-link" href="<?php echo base_url(); ?>AdminController/ShowLogs">
                            <i class="nc-icon nc-attach-87"></i>
                            <p>Logs</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>INCUNA</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>