// Inicializamos nuestras variables globales
var base_url = document.getElementById('base_url').innerHTML;
var Cpass='';
var Npass='';
var NNpass='';
// Despues de cargar el documento hacermos todo lo de aqui
jQuery(document).ready(function($) {

	$(document).ready(function(){
		
	});
	/* log */

  

    $("#changepwd").on('click', function(event) {
		//$("#new-event-modal").modal('show'); 
        Cpass=$("#current-pwd").val();
        Npass=$("#new-pwd").val();
        NNpass=$("#confirm-new-pwd").val();
        if(Cpass === '')
		swal('','Llenar los campos obligatorios', 'warning');
	else if(Npass === '')
		swal('','Llenar los campos obligatorios', 'warning');
    else if(NNpass === '')
		swal('','Llenar los campos obligatorios', 'warning');
    else if(NNpass !== Npass)
		swal('','Las contraseñas deben coincidir', 'warning');
	else {
        $.ajax({
			url: 'cambiar-contrasenia',
			type: 'POST',
			dataType: 'json',
			data:
			{
				currentPwd : Cpass,
				NewPwd : Npass
			},
			success : function(json) {
				if(json.status == "200") {
					swal('Exito','La contraseña se actualizó exitosamente', 'success');
					location.href = base_url + "mi-perfil";
				}else if(json.status == "300"){
					swal('Error','La contraseña actual es incorrecta', 'error');
				}
				else {
					swal('Error','Ha ocurrido un error', 'error');
				}

			},
			error : function(xher){console.log(xher);}
		});
    }
	});

});