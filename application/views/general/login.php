<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>INCUNA - Incubadora de empresas de la Universidad Nacional del Altiplano</title>

	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Oldenburg&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url(); ?>incuna/css/agency.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/bootstrap4/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/responsive.css">

	<!-- Emprendedor -->
	<script type="text/javascript">      

	function f_loginEmprendedor(){
		var url = "<?php echo base_url(); ?>EmprendedorController/LoginValidation";
		var usuario = $("#usuario").val();
		var password = $("#password").val();

		if(usuario==''||password=='')
		{
			$("#respuesta_emprendedor").html('<div class="alert alert-danger" role="alert">Todos los campos  son requeridos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		else{
			$.ajax({
				type: "POST",
				url: url,
				data: $("#loginEmprendedor").serialize(),
				success: function(data)
				{
					switch (data) {
						case 'EXITO':
							window.location.href = "<?php echo base_url(); ?>EmprendedorController/Enter";
							break;
						default:
							$("#respuesta_emprendedor").html('<div class="alert alert-danger" role="alert">Revise sus credenciales!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							break;
					}
				}
			});
		}
	}

	function f_loginMentor(){
		var url = "<?php echo base_url(); ?>MentorController/LoginValidation";
		var usuario = $("#usuario_mentor").val();
		var password = $("#password_mentor").val();

		if(usuario==''||password=='')
		{
			$("#respuesta_mentor").html('<div class="alert alert-danger" role="alert">Todos los campos  son requeridos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		else{
			$.ajax({
				type: "POST",
				url: url,
				data: $("#loginMentor").serialize(),
				success: function(data)
				{
					switch (data) {
						case 'EXITO':
							window.location.href = "<?php echo base_url(); ?>MentorController/Enter";
							break;
						default:
							$("#respuesta_mentor").html('<div class="alert alert-danger" role="alert">Revise sus credenciales!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							break;
					}
				}
			});
		}
	}

	function f_loginAdmin(){
		
		var url = "<?php echo base_url(); ?>AdminController/LoginValidation";
		var usuario = $("#usuario_admin").val();
		var password = $("#password_admin").val();
		if(usuario==''||password=='')
		{
			$("#respuesta_coordinador").html('<div class="alert alert-danger" role="alert">Todos los campos  son requeridos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		else{
			$.ajax({
				type: "POST",
				url: url,
				data: $("#loginAdmin").serialize(),
				success: function(data)
				{
					if(data == 'EXITO'){

						window.location.href = "<?php echo base_url(); ?>AdminController/Enter";

					} else {

						$("#respuesta_coordinador").html('<div class="alert alert-danger" role="alert">Revise sus credenciales!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					}
				}
			});
		}
	}

	</script>
</head>
<body id="page-top">

	<!-- Modal Login Emprendedor -->
	<div class="modal fade" id="emprendedorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content col-sm-9 col-md-7 col-lg-9 mx-auto">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-title text-center">
						<h2>Emprendedor</h2>
					</div>
					<div class="d-flex flex-column">
						<form id="loginEmprendedor" class="search_form" method="post">
							<div id="respuesta_emprendedor"></div>
							<div class="form-group">
								<label for="inputEmail">Usuario</label>
								<input type="email" class="form-control" id="usuario" name="usuario" placeholder="Correo electrónico" required="required" data-error="Es necesario.">
							</div>
							<div class="form-group">
								<label for="inputPassword">Contraseña</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required="required" data-error="Es necesario.">
							</div>
							<div class="col-sm-12">
								<button type="button" class="btn btn-info btn-block btn-round" onclick="f_loginEmprendedor();">Iniciar Sesión</button>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<div class="signup-section">¿Usuario nuevo? 
						<a class="text-info" href="<?php echo base_url(); ?>EmprendedorController/Registro">Registrarse</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal Login Mentor -->
	<div class="modal fade" id="mentorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content col-sm-9 col-md-7 col-lg-9 mx-auto">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-title text-center">
						<h2>Mentor</h2>
					</div>
					<div class="d-flex flex-column">
						<form id="loginMentor" class="search_form" method="post">
						<div id="respuesta_mentor"></div>
						<div class="form-group">
								<label for="inputEmail">Usuario</label>
								<input type="text" class="form-control" id="usuario_mentor" name="usuario_mentor" placeholder="Correo electrónico" required="required" data-error="Es necesario.">
							</div>
							<div class="form-group">
								<label for="inputPassword">Contraseña</label>
								<input type="password" class="form-control" id="password_mentor" name="password_mentor" placeholder="Contraseña" required="required" data-error="Es necesario.">
							</div>
							<div class="col-sm-12">
								<button type="button" class="btn btn-info btn-block btn-round" onclick="f_loginMentor();">Iniciar Sesión</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Login Coordinador -->
	<div class="modal fade" id="coordinadorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content col-sm-9 col-md-7 col-lg-9 mx-auto">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-title text-center">
						<h2>Coordinador</h2>
					</div>
					<div class="d-flex flex-column">
						<form id="loginAdmin" class="search_form" method="post">
							<div id="respuesta_coordinador"></div>
							<div class="form-group">
								<label for="inputEmail">Usuario</label>
								<input type="email" class="form-control" id="usuario_admin" name="usuario_admin" placeholder="Correo electrónico">
							</div>
							<div class="form-group">
								<label for="inputPassword">Contraseña</label>
								<input type="password" class="form-control" id="password_admin" name="password_admin" placeholder="Contraseña">
							</div>
							<button type="button" class="btn btn-info btn-block btn-round" onclick="f_loginAdmin();">Iniciar Sesión</button>
						</form>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
				</div>
			</div>
		</div>
	</div>

	<!-- Header -->
	<?php
		$data['flag'] = 'login';
		$this->load->view('general/header', $data);
	?>

	<!-- Usuarios Grid -->
	<section class="bg-light page-section" id="usuarios">
		<div class="container" style="margin-top: 12%;">
			<div class="row">
				<!-- Emprendedor -->
				<div class="col-md-4" id="emprendedor">
					<a class="btn btn-default btn-user bg-emp py-5" data-toggle="modal" href="#emprendedorModal">
						<strong>Emprendedor</strong>
						<div class="portfolio-hover mt-2">
							<div class="portfolio-hover-content">
								<i class="fas fa-users fa-2x"></i>
							</div>
						</div>
					</a>
				</div>
				<!-- Mentor -->
				<div class="col-md-4" id="mentor">
					<a class="btn btn-default btn-user bg-ment py-5" data-toggle="modal" href="#mentorModal">
						<strong>Mentor</strong>
						<div class="portfolio-hover mt-2">
							<div class="portfolio-hover-content">
								<i class="fas fa-graduation-cap fa-2x"></i>
							</div>
						</div>
					</a>
				</div>
				<!-- Coordinador -->
				<div class="col-md-4" id="coordinador">
					<a class="btn btn-default btn-user bg-coord py-5" data-toggle="modal" href="#coordinadorModal">
						<strong>Coordinador</strong>
						<div class="portfolio-hover mt-2">
							<div class="portfolio-hover-content">
								<i class="fas fa-globe fa-2x"></i>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php
		$this->load->view('general/footer', $data);
	?>
    
<script src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url(); ?>/assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/easing/easing.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
</body>
</html>