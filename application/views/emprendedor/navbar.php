<script>
    function f_logout()
        {
            window.location.href = "<?php echo base_url(); ?>EmprendedorController/Logout";
        }
</script>

<!-- Navbar -->
<link href="<?php echo base_url(); ?>/assets/assets_ini/css/demo.css" rel="stylesheet" />
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>/EmprendedorController/foro">
                        <span class="no-icon">Ir al foro</span>
                    </a>
                </li>
                <li class="nav-item">
                    <button class="btn_logout" type="button" onclick="f_logout();">
                        <strong>Salir</strong>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
            <!-- End Navbar -->