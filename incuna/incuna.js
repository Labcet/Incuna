function f_login(){

	var url = "<?php echo base_url(); ?>/EmprendedorController/LoginValidation";
	//var url = "<?php echo base_url(); ?>/main/validate";
	var user_name = $("#usuario").val();  
		var password = $("#password").val();
	if(user_name==''||password=='')  
		{  
			//alert("Todos los campos son requeridos!");  
			$("#respuesta").html('<div class="alert alert-danger" role="alert">Todos los campos son requeridos!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		else{
			$.ajax({                        
				type: "POST",                 
				url: url,                     
				data: $("#loginEmprendedor").serialize(),
				success: function(data)             
				{
					window.location.href = "<?php echo base_url(); ?>EmprendedorController/Enter";
				},
				statusCode:{
					400: function(xhr){
						$("#respuesta").html('<div class="alert alert-danger" role="alert">Revise sus credenciales!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					},
					401: function(xhr){
					}
				}
			});
		}
}

function f_registro(){
	window.location.href = "<?php echo base_url(); ?>/EmprendedorController/registro";
}