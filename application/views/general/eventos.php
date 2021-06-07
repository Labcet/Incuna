<!DOCTYPE html>
<html lang="es">
<head>
<title>Incuna</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Archivo+Black|Righteous&display=swap" rel="stylesheet">  
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/responsive.css">
</head>
<body>

<div class="super_container">
	<!-- Header -->
	
	<?php
        $data['flag'] = 'eventos';
		$this->load->view('general/header', $data);
	?>
	
	<!-- Home -->

	<div id="inicio" class="home">
		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url('<?php echo base_url(); ?>incuna/img/expoferia/ef-001.jpg');filter:brightness(0.7);">
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
						<h1>Eventos</h1>
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
									<img src="<?php echo base_url(); ?>/assets/images/event_1.jpg" alt="https://unsplash.com/@theunsteady5">
								</div>
							</div>
						</div>	
					</div>
				</div><br>
				<?php endforeach; ?>
            </div>
		</div>
	</div>

	<!-- Footer -->

	<?php
		$this->load->view('general/footer', $data);
	?>

</div>

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
