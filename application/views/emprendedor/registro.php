<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>INCUNA - Incubadora de empresas de la Universidad Nacional del Altiplano</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>incuna/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="<?php echo base_url(); ?>incuna/css/agency.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url(); ?>incuna/css/agency.css" rel="stylesheet">

	<!-- Emprendedor -->
	<script type="text/javascript">      

	function f_registro(){

		/* CONFIRMACION DE CONTRASEÑA */

		var url = "<?php echo base_url(); ?>EmprendedorController/RegistraNuevoEstudiante";
		var password = $("#password").val();
		var password_repeat = $("#password_repeat").val();

		if(password != password_repeat){

			$("#respuesta").html('<div class="alert alert-danger" role="alert">Las contraseñas no coinciden!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

		} else{

			$.ajax({
				type: "POST",
				url: url,
				data: $("#formulario_registro").serialize(),
				success: function(data)
				{
					switch (data) {
						case 'EXITO':
							$("#respuesta").html('<div class="alert alert-success" role="alert">Datos guardados correctamente!</div>');
							window.location.href = "<?php echo base_url(); ?>EmprendedorController/Login";
							break;
						case 'ERROR_INSERCION':
							$("#respuesta").html('<div class="alert alert-danger" role="alert">Error en el registro!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							break;
						case 'ERROR_EXISTENCIA':
							$("#respuesta").html('<div class="alert alert-danger" role="alert">Ya existe una cuenta con ese usuario!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							break;
						default:
							$("#respuesta").html('<div class="alert alert-danger" role="alert">Debe llenar todos los campos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							break;
					}
				}
			});
		}
	}

	</script>
	<style type="text/css">
		:root {
		  --input-padding-x: 1.5rem;
		  --input-padding-y: .75rem;
		}

		#registro {
		  background: #007bff;
		  background: linear-gradient(to right, #26237C, #9C98FF);
		}

	</style>

</head>
<body>
	
	<!-- Header -->
	<?php
		$data['flag'] = 'login';
		$this->load->view('general/header', $data);
	?>

	<section class="bg-light page-section" id="registro">
		<div class="container">
			<div class="row py-4"></div>
			<div class="row">
				<div class="col-lg-10 col-xl-9 mx-auto">
					<div class="card card-signin flex-row my-5 pb-5">
						<div class="card-img-left d-none d-md-flex">
							 <!-- Background image for card set in CSS! -->
						</div>
						<div class="card-body">
							<h2 class="card-title text-center">Regístrate</h2>
							<br>
							<div id="respuesta"></div>
							<br>
							<form class="form" id="formulario_registro" method="post">
								<div class="row">
									<div class="form-group col-md-4">
										<input name="codigo" type="text" id="codigo" class="form-control" placeholder="Código" required>
									</div>
									<div class="form-group col-md-4">
										<input name="dni" type="text" id="dni" class="form-control" placeholder="DNI" required>
									</div>
									<div class="form-group col-md-4">
										<input name="usuario" type="text" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<input name="password" type="password" id="password" class="form-control" placeholder="Contraseña" required autofocus>
									</div>
									<div class="form-group col-md-6">
										<input name="password_repeat" type="password" id="password_repeat" class="form-control" placeholder="Confirme Contraseña" required autofocus>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<input name="nombre" type="text" id="nombre" class="form-control" placeholder="Nombres" required>
									</div>
									<div class="form-group col-md-6">
										<input name="paterno" type="text" id="paterno" class="form-control" placeholder="Apellido Paterno" required autofocus>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<input name="materno" type="text" id="materno" class="form-control" placeholder="Apellido Materno" required autofocus>
									</div>
								</div>
								<hr>
								<div class="w-100">
									<button type="button" class="btn btn-lg btn-primary btn-block text-uppercase" onclick="f_registro();">Registrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php
		$this->load->view('general/footer', $data);
	?>

</body>
</html>