// Inicializamos nuestras variables globales
var base_url = document.getElementById('base_url').innerHTML;
var imagen='';
// Despues de cargar el documento hacermos todo lo de aqui
jQuery(document).ready(function($) {

	$(document).ready(function(){
	});
	/* log */
	  
});  

    $("#btn_EditText").on('click', function(event) {
        EditText();
	});

    $(".fa-pencil").on('click', function(event) {
		
		SeeText(this.id);
		$("#edit-text-modal").modal('show'); 

	});

	
/*funciones */

/*editar*/
function EditText()
{
		var id = $("#id-info").val();
		var titulo = $("#titulo-info").val();
		var desc = $("#desc-info").val();

      
		$.ajax({
			url: 'edit-info',
			type: 'POST',
			dataType: 'json',
			data:
			{
				id:id,
				titulo : titulo,
				desc:desc
			},
			success : function(json) {
			if(json.status == "200") {
					sweetAlert('Exito','Artículo editado', 'success', 2000, false);
					setTimeout(function(){ 
						location.href = base_url + "gestion-info";          
					}, 1900);
				}else if(json.status == "300"){
					swal('Error','Ha ocurrido un error', 'error');
				}
				else {
					swal('Error','Ha ocurrido un error', 'error');
				}
			},
			error : function(xher){
				console.log(xher);
			}
		});		
			
} 


var sweetAlert = function(title, message, status, timer = 5000, isReload = false){
	swal({
		title   : title,
		text    : message + '',
		type    : status,
		html    : message,
		timer   : timer,
		showCancelButton: false,
		showConfirmButton: false,
		allowEscapeKey  : false
	}, function () {
		swal.close();
		if(isReload)
			location.reload(true);
	});
	var e = $(".sweet-alert").find(".swal-timer-count");
	var n = +e.text();
	setInterval(function(){
		n > 1 && e.text (--n);
	}, 1000);
}


function SeeText(id)
{
		
		$.ajax({
			url: 'get-text',
			type: 'POST',
			dataType: 'json',
			data:
			{
				id_info: id
			},
			success : function(json) {
				if(json.status == "200") {
					console.log(json.texto[0]);
                    $("#titulo-info").val(json.texto[0].titulo_info);
					$("#desc-info").val(json.texto[0].desc_info);
                    $("#id-info").val(json.texto[0].id_info);
				}

				else {
					swal('Error','Error', 'error');
				}
			},
			error : function(xher){console.log(xher);}
		});
	

		
} 