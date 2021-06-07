<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>INCUNA - ADMIN</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> 
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

	<script type="text/javascript">

		/*CRUD Estudiantes*/
		$(document).ready(function(){
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();
			
			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function(){
				if(this.checked){
					checkbox.each(function(){
						this.checked = true;                        
					});
				} else{
					checkbox.each(function(){
						this.checked = false;                        
					});
				} 
			});
			checkbox.click(function(){
				if(!this.checked){
					$("#selectAll").prop("checked", false);
				}
			});
		});
		/*nav i active*/
		$('.navbar-nav .nav-link').click(function(){
		$('.navbar-nav .nav-link').removeClass('active');
		$(this).addClass('active');
		})

		/*Funcion cerrar sesion*/
		function f_logout()
		{
			window.location.href = "<?php echo base_url(); ?>AdminController/Logout";
		}

		
	</script>
</head>