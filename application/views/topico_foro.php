<!DOCTYPE html>
<html lang="es">
<head>
<title>Incuna</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Archivo+Black|Righteous|Lilita+One&display=swap" rel="stylesheet">  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="<?php echo base_url(); ?>/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/responsive.css">
<script type="text/javascript">      

	function Suscripcion(){

		var url = "<?php echo base_url(); ?>GeneralController/suscripcion_validation";

		$.ajax({
			type: "POST",
			url: url,
			data: $("#suscription_form").serialize(),
			success: function(data)
			{
				
			}
		});
	}

	function f_registrar_pregunta(){

		var url = "<?php echo base_url(); ?>EmprendedorController/registra_pregunta";
		var pregunta = $("#pregunta").val();
		var descripcion = $("#descripcion").val();
			if(pregunta == "" || descripcion == ""){
				$("#respuesta").html('<div class="alert alert-danger" role="alert">Los campos son requeridos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			else{
				$.ajax({                        
					type: "POST",                 
					url: url,                     
					data: $("#form_foro").serialize(),
					success: function(data)             
					{
						window.location.href = "<?php echo base_url(); ?>/EmprendedorController/foro";   
					},
					statusCode:{
						500: function(xhr){
							
							$("#respuesta").html('<div class="alert alert-danger" role="alert">Debes iniciar sesion. <a href="" data-toggle="modal" data-target="#Modal_Foro_Login">Logeate!</a> o <a href="" data-toggle="modal" data-target="#Modal_Foro_Registro">Registrate!</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						},
						401: function(xhr){
							$("#respuesta").html('<div class="alert alert-danger" role="alert">Error. <a href="" data-toggle="modal" data-target="#Modal_Foro">Logeate!</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						}
					}
				});
			}
	}

	function f_registro_foro(){

		var url = "<?php echo base_url(); ?>/EmprendedorController/registra_foro";
		var nombre = $("#nombre").val();
		var paterno = $("#paterno").val();
		var materno = $("#materno").val();
		var usuario = $("#usuario").val();  
		var password = $("#password").val();

		if(nombre==''||paterno==''||materno==''||usuario==''||password=='')  
		{  
			$("#respuesta_r").html('<div class="alert alert-danger" role="alert">Todos los campos son requeridos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
		}
		else{
			$.ajax({                        
				type: "POST",                 
				url: url,                     
				data: $("#form_registro_foro").serialize(),
				success: function(data)             
				{
					window.location.href = "<?php echo base_url(); ?>/EmprendedorController/foro";
				},
				statusCode:{
					400: function(xhr){
						
						$("#respuesta").html('<div class="alert alert-danger" role="alert">Error al guardar los datos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					},
					401: function(xhr){
						$("#respuesta").html('<div class="alert alert-danger" role="alert">Error al realizar la consulta!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					}
				}
			});
		}
	}

	function f_logeo_foro(){

		var url = "<?php echo base_url(); ?>/EmprendedorController/logeo_foro";
		var usuario_log = $("#usuario_log").val();
		var password_log = $("#password_log").val();

		if(usuario_log==''||password_log=='')  
		{  
			$("#respuesta_rlog").html('<div class="alert alert-danger" role="alert">Todos los campos son requeridos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
		}
		else{
			$.ajax({                        
				type: "POST",                 
				url: url,                     
				data: $("#form_logeo_foro").serialize(),
				success: function(data)             
				{
					window.location.href = "<?php echo base_url(); ?>/EmprendedorController/foro";
				},
				statusCode:{
					400: function(xhr){
						
						$("#respuesta_rlog").html('<div class="alert alert-danger" role="alert">Revise sus credenciales!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					},
					401: function(xhr){
						
					}
				}
			});
		}
	}

	function f_registrar_comentario(){

		var url = "<?php echo base_url(); ?>/EmprendedorController/registra_comentario";
		var comentario = $("#comentario").val();
		var redi = $("#id_t").val();

		if(comentario=='')  
		{  
			$("#respuesta_comentario").html('<div class="alert alert-danger" role="alert">Debe rellenar el campo!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
		}
		else{
			$.ajax({                        
				type: "POST",                 
				url: url,                     
				data: $("#form_comentario").serialize(),
				success: function(data)             
				{
					alert("Su comentario ha sido registrado correctamente!");
					window.location.href = "<?php echo base_url(); ?>/EmprendedorController/foro";
				},
				statusCode:{
					500: function(xhr){
							
						$("#respuesta_comentario").html('<div class="alert alert-danger" role="alert">Debes iniciar sesion. <a href="" data-toggle="modal" data-target="#Modal_Foro_Login">Logeate!</a> o <a href="" data-toggle="modal" data-target="#Modal_Foro_Registro">Registrate!</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					},
					401: function(xhr){
						alert("error");
					}
				}
			});
		}
	}
		
	</script>
</head>
<body>

	<!-- Modal Foro Registro-->
	<div class="modal fade" id="Modal_Foro_Registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-scrollable" role="document">
	      	<div class="modal-content">
	        	<div class="modal-header modal-header-foro">
	          		<h2 class="modal-title" id="exampleModalCenterTitle">Registrate</h2>
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            	<span aria-hidden="true">&times;</span>
	          		</button>
	        	</div>
	        	<div class="modal-body">
	        		<form id="form_registro_foro" method="post">
					  	<div class="row">
					    	<div class="col">
					      		<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
					    	</div>
					  	</div>
					  	<br>
					  	<div class="row">
					    	<div class="col">
					      		<input type="text" id="paterno" name="paterno" class="form-control" placeholder="Apellido paterno">
					    	</div>
					  	</div>
					  	<br>
					  	<div class="row">
					    	<div class="col">
					      		<input type="text" id="materno" name="materno" class="form-control" placeholder="Apellido materno">
					    	</div>
					  	</div>
					  	<br>
					  	<div class="row">
					    	<div class="col">
					      		<input type="text" id="usuario" name="usuario"class="form-control" placeholder="Usuario">
					    	</div>
					    	<div class="col">
					      		<input type="text" id="password" name="password" class="form-control" placeholder="Password">
					    	</div>
					  	</div>
					</form>
	        	</div>
	        	<div id="respuesta_r"></div>
	        	<div class="modal-footer">
	          		<input type="button" class="btn btn_foro btn-fill" value="Registrarse" onclick="f_registro_foro();"/>
	        	</div>
	      	</div>
	    </div>
	</div>
	<!-- Fin Modal Foro Registro-->

	<!-- Modal Foro Login-->
	<div class="modal fade" id="Modal_Foro_Login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-scrollable" role="document">
	      	<div class="modal-content">
	        	<div class="modal-header modal-header-foro">
	          		<h2 class="modal-title" id="exampleModalCenterTitle">Ingresa</h2>
	          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            	<span aria-hidden="true">&times;</span>
	          		</button>
	        	</div>
	        	<div class="modal-body">
	        		<form id="form_logeo_foro" method="post">
					  	<div class="row">
					    	<div class="col">
					      		<input type="text" id="usuario_log" name="usuario_log" class="form-control" placeholder="Usuario">
					    	</div>
					  	</div>
					  	<br>
					  	<div class="row">
					    	<div class="col">
					      		<input type="text" id="password_log" name="password_log" class="form-control" placeholder="Password">
					    	</div>
					  	</div>
					  	<br>
					</form>
	        	</div>
	        	<div id="respuesta_rlog"></div>
	        	<div class="modal-footer">
	          		<input type="button" class="btn btn_foro btn-fill" value="Entrar" onclick="f_logeo_foro();"/>
	        	</div>
	      	</div>
	    </div>
	</div>
	<!-- Fin Modal Foro Login-->

<div class="super_container">

	<!-- Header -->

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
						<li class="main_nav_item"><a href="<?php echo base_url(); ?>/EmprendedorController/enter"><?php echo $uname?></a></li>
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
					<li class="main_nav_item"><a href="<?php echo base_url(); ?>/EmprendedorController/enter"><?php echo $uname?></a></li>
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

	<!-- FONDO -->

	<div id="inicio" class="pregunta_foro" style="background-image:url('<?php echo base_url(); ?>/assets/images/incuna_background.jpg');">
		<div class="container">
          <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
              <div class="card card_foro">
                <div class="card-body">
                  <form name="form_foro" id="form_foro" action="post">
                    <div class="row">
                      <div class="col-md">
                        <div class="form-group">
                          <label class="pregunta_ini"><!--<img src="https://www.attivazioni360.com/wp-content/uploads/2017/10/luce-e-gas.png" width="40px">-->¿Cuál es tu pregunta?</label>
                          <input id="pregunta" name="pregunta" type="text" class="form-control"  placeholder="Pregunta" value="">
                        </div>
                      </div> 
                    </div>                                        
                    <div class="row">
                      <div class="col-md">
                        <div class="form-group">
                          <textarea id="descripcion" name="descripcion" rows="4" cols="80" class="form-control" placeholder="Descripción" value=""></textarea>
                        </div>
                      </div>
                    </div>
                    <div id="respuesta"></div>
                    <input type="button" name="" type="submit" class="btn btn-info btn-fill pull-right" onclick="f_registrar_pregunta();"value="Publicar">
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
    </div>
	</div>

	<!-- FIN FONDO -->

	<!-- PREGUNTA -->

	<div id="eventos" class="page_section_foro">
	  	<div class="row">
	  		<div class="col">
				<div class="container">
					<h1>Tópico</h1>
					<div class="publicaciones_foro">
						<!-- TOPICO -->
						<?php foreach($user_topico as $usert): ?>
						<div class="card text-white bg-dark topico_foro">
						  <div class="card-header">
						    <ul class="nav nav-pills card-header-pills">
						      <li class="nav-item">
						        <img src="https://image.flaticon.com/icons/png/512/610/610120.png" width="45px">
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="#"><?php echo $usert->Usuario; ?> 
						        <img src="https://www.stickpng.com/assets/images/58afdad6829958a978a4a693.png" width="5px" height="5px"></a>
						        
						      </li>
						    </ul>
						  </div>
						  <div class="card-body">
						  	<?php echo '<input type="text" name="id_topico" value="'.$usert->Id.'" hidden>'?>
						    <h3><?php echo $usert->Pregunta; ?></h3><br>
						    <p class="card-text"><?php echo $usert->Descripcion; ?></p>
						  </div>
						</div>
						<br><br>
						<?php endforeach; ?>
						<!-- FIN TOPICO -->

						<!-- RESPUESTA TOPICO--> 
						<div class="card text-white bg-danger topico_foro">
						  <div class="card-header">
						    <ul class="nav nav-pills card-header-pills">
						      <li class="nav-item">
						        <img src="https://image.flaticon.com/icons/png/512/610/610120.png" width="45px">
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="#"><span class="comentador"><?php echo $uname?></span></a>
						      </li>
						    </ul>
						  </div>
						  <form name="form_comentario" id="form_comentario" action="post">
							  <div class="card-body"><br>
							    <textarea id="comentario" name="comentario" rows="4" cols="80" class="form-control" placeholder="Comentario" value=""></textarea><br>
							    <div id="respuesta_comentario"></div>
							    <?php foreach($user_topico as $userc): ?>
							    <?php echo '<input type="text" name="id_t" id="id_t" value="'.$userc->Id.'" hidden>'?>
							    <input type="button" name="" type="submit" class="btn btn-primary btn-fill" onclick="f_registrar_comentario();" value="Comentar">
							    <?php endforeach; ?>
							  </div>
						  </form>
						</div><br><br>
						<!-- FIN RESPUESTA TOPICO -->

						<h2>Comentarios anteriores</h2><br>
						<!-- COMENTARIOS ANTERIORES-->
						<?php foreach($respuestas_topico as $resp): ?>
						<div class="card text-white bg-dark topico_foro">
						  <div class="card-header">
						    <ul class="nav nav-pills card-header-pills">
						      <li class="nav-item">
						        <img src="https://image.flaticon.com/icons/png/512/610/610120.png" width="45px">
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="#"><?php echo $resp->Usuario; ?> 
						        <img src="https://www.stickpng.com/assets/images/58afdad6829958a978a4a693.png" width="5px" height="5px"></a>
						        
						      </li>
						    </ul>
						  </div>
						  <div class="card-body">
						    <h3>Respondiendo: </h3><br>
						    <p class="card-text"><?php echo $resp->Descripcion; ?></p>
						  </div>
						</div>
						<br><br>
						<?php endforeach; ?>
						<!-- FIN COMENTARIOS ANTERIORES -->

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FIN PREGUNTA -->

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<!-- Newsletter -->

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Suscríbete para recibir más noticias</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email" required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Suscribirse</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="<?php echo base_url(); ?>/assets/images/logo.png" alt="">
								<span>INCUNA</span>
							</div>
						</div>

						<p class="footer_about_text">INCUNA, es un organismo de la Universidad Nacional del Altiplano Puno que se encarga de incentivar a jóvenes universitarios para formar empresas exitosas. </p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menú</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Inicio</a></li>
								<li class="footer_list_item"><a href="#">Eventos</a></li>
								<li class="footer_list_item"><a href="courses.html">Contáctenos</a></li>
								<li class="footer_list_item"><a href="news.html">Foro</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Enlaces Útiles</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Testimonios</a></li>
								<li class="footer_list_item"><a href="#">FAQ</a></li>
								<li class="footer_list_item"><a href="#">Comunidad</a></li>
								<li class="footer_list_item"><a href="#">Organigrama</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contacto</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?php echo base_url(); ?>/assets/images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Av. Floral 1153, Puno 21001
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?php echo base_url(); ?>/assets/images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									+051 959 681 467
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?php echo base_url(); ?>/assets/images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>incuna@unap.edu.pe
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy; <script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Incuna</a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="https://www.pinterest.es/"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="https://pe.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

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