// Inicializamos nuestras variables globales
var base_url = document.getElementById('base_url').innerHTML;
var imagen='';
// Despues de cargar el documento hacermos todo lo de aqui
jQuery(document).ready(function($) {

	$(document).ready(function(){
		$('input[type="file"]').change(function(e){
			imagen  = e.target.files[0].name;
		});
	});
	/* log  */
	$('#form_img').on('submit', function(e){  
		e.preventDefault();  
		if(imagen === ''){
		swal('','Ingresa la imagen', 'warning');
        }else {
		var formData = new FormData(this);
		var inputValue = formData.get("file_img");
		//console.log(inputValue);

			 $.ajax({  
				  url: base_url+"GaleriaController/ajax_upload",   
				  //base_url() = http://localhost/tutorial/codeigniter  
				  method:"POST",  
				  data:new FormData(this),  
				  contentType: false,  
				  cache: false,  
				  processData:false,  
				  success:function(data)  
				  {  
					  //console.log(data);
					  sweetAlert('Exito','Imagen agregada', 'success', 2000, false);
                        setTimeout(function(){ 
							location.href = base_url + "gestion-galeria";          
                        }, 1900);
				  }  
			 });  
		}
		  
   });  

  

    $("#btn_newEvent").on('click', function(event) {
		$("#new-event-modal").modal('show'); 
	});


	$(".remove-link").on('click', function(event) {
				
		var id=this.id;
		
		swal({
            title: 'Confirmación',
            text: '¿Desea eliminar esta imagen?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar',
            reverseButtons: true})
        .then(function(result){
			removeImage(id);
        },
        function(dismiss){
        });

	});

});


/*funciones log*/
function AddEvent()
{
		var nombre = $("#nom-event").val().toLowerCase();
		var lugar = $("#lug-event").val();
        var descripcion = $("#desc-event").val().toLowerCase();
		var dia = $(".dia-event").val();
        var mes = $(".mes-event").val();
        var anio = $(".anio-event").val();
        var hora = $(".hora-event").val();
        var minutos = $(".min-event").val();
		var categoria = $(".cat-event").val();
		//var imagen= $('#file_img').val();
		var fecha=anio+'-'+mes+'-'+dia;
		 hora=hora+':'+minutos;


      
		$.ajax({
			url: 'add-event',
			type: 'POST',
			dataType: 'json',
			data:
			{
				nombre : nombre,
				lugar:lugar,
				descripcion:descripcion,
				fecha:fecha,
				hora:hora,
				minutos:minutos,
				categoria:categoria,
				imagen:imagen
			},
			success : function(json) {
			if(json.status == "200") {
					swal('Exito','El evento se ha creado exitosamente', 'success');
					location.href = base_url + "gestion-eventos";
				}else if(json.status == "300"){
					swal('Error','Ha ocurrido un error', 'error');
				}
				else {
					swal('Error','Ha ocurrido un error', 'error');
				}
			},
			error : function(xher){
				//console.log(xher);
				
				sweetAlert('Exito','Evento creado', 'success', 2000, false);
                        setTimeout(function(){ 
							location.href = base_url + "gestion-eventos";          
                        }, 1900);
			}
		});		
			
} 



/*Eliminar evento */
function removeImage(idR)
{
		$.ajax({
			url: 'remove-img',
			type: 'POST',
			dataType: 'json',
			data:
			{
				id:idR
			},
			success : function(json) {
			if(json.status == "200") {
					sweetAlert('Exito','Imagen eliminada', 'success', 2000, false);
					setTimeout(function(){ 
						location.href = base_url + "gestion-galeria";          
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


