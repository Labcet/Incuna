<head>
	<link href="https://fonts.googleapis.com/css?family=Archivo+Black|Righteous&display=swap" rel="stylesheet">  
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/bootstrap4/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/responsive.css">
</head>

<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="<?php echo base_url(); ?>/assets/images/logo.png" alt="">
					<span>INCUNA</span>
				</div>
			</div>
			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="<?php echo base_url(); ?>GeneralController/index">inicio</a></li>
						<?php if ($flag !== 'login') : ?>	
							<li class="main_nav_item"><a href="#eventos">eventos</a></li>
						<?php endif; ?>
						<?php if ($flag === 'index') : ?>
							<li class="main_nav_item"><a href="#contacto">contáctenos</a></li>
						<?php endif; ?>
						<?php if ($flag !== 'login') : ?>
							<li class="main_nav_item"><a href="<?php echo base_url(); ?>GeneralController/Login">Login</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="<?php echo base_url(); ?>/assets/images/phone-call.svg" alt="">
			<span>051 - 959681467</span>
		</div>
		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>
	</header>
	
	<!-- Menu -->
	<div class="menu_container menu_mm">
		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>
		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="<?php echo base_url(); ?>GeneralController/index">Inicio</a></li>
					<?php if ($flag !== 'login') : ?>	
						<li class="menu_item menu_mm"><a href="#eventos">Eventos</a></li>
					<?php endif; ?>
					<?php if ($flag === 'index') : ?>
						<li class="menu_item menu_mm"><a href="#contacto">Contáctenos</a></li>
					<?php endif; ?>
					<?php if ($flag !== 'login') : ?>
						<li class="menu_item menu_mm"><a href="<?php echo base_url(); ?>GeneralController/login">Login</a></li>
					<?php endif; ?>
				</ul>
				<!-- Menu Social -->
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>
		</div>
	</div>