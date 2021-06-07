		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>AdminController/Enter">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Incuna<sup>Admin</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url(); ?>AdminController/Enter">
					<i class="fas fa-home"></i>
					<span>Inicio</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">Usuarios</div>

			<!-- Nav Item - Estudiantes -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>AdminController/EstudianteLista">
					<i class="fas fa-users"></i>
					<span>Estudiantes</span></a>
			</li>
			<!-- Nav Item - Mentores -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>AdminController/MentorLista">
					<i class="fas fa-graduation-cap"></i>
					<span>Mentores</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">Tareas</div>

			<!-- Nav Item - Convocatorias -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>AdminController/ConvocatoriaLista">
					<i class="fas fa-rocket"></i>
					<span>Convocatorias</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">Control</div>

			<!-- Nav Item - Log de Usuarios -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>AdminController/LogShow">
					<i class="far fa-file"></i></i>
					<span>Registro de Actividades</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>