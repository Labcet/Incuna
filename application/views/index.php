<!DOCTYPE html>
<html lang="es">
<head>
<title>Incuna</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript">      

	function Contactos(){

		var url = "<?php echo base_url(); ?>GeneralController/ContactoValidation";

		$.ajax({
			type: "POST",
			url: url,
			data: $("#search_form").serialize(),
			success: function(data)
			{
				switch (data) {
					case 'EXITO':
						$("#respuesta").html('<div class="alert alert-success" role="alert">Se envío correctamente!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						window.location.href = "<?php echo base_url(); ?>GeneralController/index";
						break;
					case 'ERROR_REGISTRO':
						$("#respuesta").html('<div class="alert alert-danger" role="alert">Error en el registro!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						break;
					case 'ERROR_EXISTENCIA':
						$("#respuesta").html('<div class="alert alert-danger" role="alert">El correo ya fue registrado!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						break;
					default:
						$("#respuesta").html('<div class="alert alert-danger" role="alert">Error en la validación!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						break;
				}
			}
		});
	}

	function Suscripcion(){

		var url = "<?php echo base_url(); ?>GeneralController/SuscriptionValidation";

		$.ajax({
			type: "POST",
			url: url,
			data: $("#suscription_form").serialize(),
			success: function(data)
			{
				switch (data) {
					case 'EXITO':
						window.location.href = "<?php echo base_url(); ?>GeneralController/index";
						break;
					case 'ERROR_REGISTRO':
						alert('Error al registrar correo!');
						break;
					case 'ERROR_EXISTENCIA':
						alert('El correo ya fue registrado!');
						break;
					default:
						alert('Error en la validación!');
						break;
				}
			}
		});
	}

</script>
</head>
<body>

<div class="super_container">
	<!-- Header -->
	
	<?php
		$data['flag'] = 'index';
		$this->load->view('general/header', $data);
	?>
	
	<!-- Home -->

	<div id="inicio" class="home">
		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url('<?php echo base_url(); ?>/incuna/img/expoferia/ef-001.jpg');filter:brightness(0.7);">
					</div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Comienza a <span>Emprender</span> hoy!</h1>
						</div>
					</div>
				</div>
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url('<?php echo base_url(); ?>incuna/img/expoferia/ef-005.jpg');filter:brightness(0.6);">
      				</div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Forma tu <span>Equipo</span> ahora!</h1>	
						</div>
					</div>
				</div>
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url('<?php echo base_url(); ?>incuna/img/expoferia/ef-006.jpg');filter:brightness(0.6);"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Lanza tus <span>Ideas</span> al mundo!</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Events -->

	<div id="eventos" class="events page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Últimos Eventos</h1>
					</div>
				</div>
			</div>
			<div class="event_items">
				<!-- Event Item -->
				<?php foreach($evento as $eve):?>
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">
							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<?php echo '<div class="event_day">'.date('d',strtotime($eve->Fecha)).'</div>'?>
									<?php echo '<div class="event_month">'.date('F',strtotime($eve->Fecha)).'</div>'?>
								</div>
							</div>
							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<?php echo '<div class="event_name"><a class="trans_200" href="#"><strong>'.$eve->Titulo.'</strong></a></div>'?>
									<?php echo '<div class="event_location">'.$eve->Lugar.'</div>
									<p>'.$eve->Descripcion.'</p>'?>
								</div>
							</div>
							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<?php if($eve->Portada == null): ?>
										<img src="<?php echo base_url(); ?>/assets/images/event_1.jpg" alt="https://unsplash.com/@theunsteady5">
									<?php else: ?>
										<?php echo '<img src="'.base_url().'eventos_img/'.$eve->Portada.'" alt="Portada">'?>
									<?php endif; ?>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<?php endforeach; ?>
			</div>
				<div class="button button_1 mx-auto trans_200 text-center register_button"><a href="<?php echo base_url(); ?>GeneralController/AllEventos">Más Eventos</a></div>
			</div>	
		</div>
	</div>

	<!-- Register -->

	<div id="contacto">

		<div class="container-fluid">
			
			<div class="row row-eq-height">
				<div class="col-lg-6 nopadding">
					
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Inscríbete ahora y difruta el <span><strong> 100% </strong></span> de las actividades</h1>
							<p class="register_text">	</p>
							
						</div>
					</div>

				</div>

				<div class="col-lg-6 nopadding">
					
					<!-- Search -->

					<div class="search_section d-flex flex-column align-items-center justify-content-center">
						<div class="search_background" style="background-image:url('<?php echo base_url(); ?>/assets/images/search_background.jpg');"></div>
						<div class="search_content text-center">
							<h1 class="search_title">Contáctate con nosotros</h1>
							<form id="search_form" class="search_form" method="post">
								<div id="respuesta"></div>
								<input id="nombre" name="nombre" class="input_field search_form_name" type="text" placeholder="Nombres" required="required" data-error="Course name is required.">
								<input id="email" name="email" class="input_field search_form_name" type="text" placeholder="Email" required="required">
								<input id="mensaje" class="input_field" name="mensaje" type="text" placeholder="Mensaje" required="required" rows="3">
								<button id="submit_button" type="button" class="search_submit_button trans_200" onclick="Contactos();">Enviar</button>
							</form>
						</div> 
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	
	<?php
		$this->load->view('general/footer', $data);
	?>

</div>

</body>
</html>
