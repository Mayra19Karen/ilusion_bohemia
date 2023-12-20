// Inicializamos nuestras variables globales
var base_url = document.getElementById('base_url').innerHTML;
// Despues de cargar el documento hacermos todo lo de aqui
jQuery(document).ready(function($) {
	/* log */


    $("#log_button").on('click', function(event) {
		logIn();
        //alert('hola en loginjs');
	});

});


/*funciones log*/
function logIn()
{
	if($("#email").val() === '')
		swal('','Para ingresar debes llenar los campos obligatorios', 'warning');
	else if($("#name").val() === '')
		swal('','Para ingresar debes llenar los campos obligatorios', 'warning');
	else {
		var usuario = $("#email").val().toLowerCase();
		var pass = $("#name").val();
		$.ajax({
			url: 'sesion',
			type: 'POST',
			dataType: 'json',
			data:
			{
				user : usuario,
				pass : pass
			},
			success : function(json) {
				if(json.status == "200") {
					location.href = base_url + "gestion-eventos";
				}else if(json.status == "300"){
					swal('Error','El usuario se encuentra desabilitado', 'error');
				}
				else {
					swal('Error','Usuario y/o contraseña incorrectos', 'error');
				}
			},
			error : function(xher){console.log(xher);}
		});
	}
} 