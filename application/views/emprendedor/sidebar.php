<link href="<?php echo base_url(); ?>/assets/assets_ini/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

<div class="sidebar" data-image="<?php echo base_url(); ?>/assets/assets_ini/img/sidebar-5.jpg">
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
                        <a class="nav-link" href="<?php echo base_url(); ?>EmprendedorController/Enter">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li id="link_perfil">
                        <a class="nav-link" href="<?php echo base_url(); ?>EmprendedorController/PerfilShow">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Perfil</p>
                        </a>
                    </li>
                    <li id="ideas">
                        <a class="nav-link active" href="<?php echo base_url(); ?>EmprendedorController/IdeaShow">
                            <i class="nc-icon nc-bulb-63"></i>
                            <p>Mis Ideas</p>
                        </a>
                    </li>
                    <?php if($this->session->userdata('convocatoria') !== 0) : ?>
                        <li id="macrofiltro">
                            <a class="nav-link" href="<?php echo base_url(); ?>EmprendedorController/Macrofiltro">
                                <i class="nc-icon nc-notes"></i>
                                <p>Macrofiltro</p>
                            </a>
                        </li>
                        <li id="microfiltro">
                            <a class="nav-link" href="<?php echo base_url(); ?>EmprendedorController/Microfiltro">
                                <i class="nc-icon nc-notes"></i>
                                <p>Microfiltro</p>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li id="link_test">
                        <a class="nav-link" href="<?php echo base_url(); ?>EmprendedorController/Test">
                            <i class="nc-icon nc-notes"></i>
                            <p>Test Emprendedor</p>
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