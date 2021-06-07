<script type="text/javascript">
    function vista(){
        var url = "<?php echo base_url(); ?>/MentorController/ShowEstadoIdeas";
        $('#content').load(url);
    }
</script>
<link href="<?php echo base_url(); ?>/assets/assets_ini/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

<div class="sidebar" data-color="orange" data-image="<?php echo base_url(); ?>/assets/assets_ini/img/sidebar-5.jpg">
   <div class="sidebar-wrapper">
                <div class="logo text-center" >
                    <h4>Bienvenido(a) <?php echo $uname?></h4>
                </div>
                <ul class="nav">
                    <li id="link_dashboard">
                        <a class="nav-link" href="<?php echo base_url(); ?>MentorController/Enter">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li id="link_perfil">
                        <a class="nav-link" href="<?php echo base_url(); ?>MentorController/PerfilShow">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Perfil</p>
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