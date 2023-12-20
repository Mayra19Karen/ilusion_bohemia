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
	/* log */
	$('#form_img').on('submit', function(e){  
		e.preventDefault();  
		if($("#nom-event").val() === '')
		swal('','Ingresa el nombre del evento', 'warning');
	else if($("#lug-event").val() === '')
		swal('','Ingresa el lugar', 'warning');
	else if(imagen === '')
		swal('','Ingresa la imagen', 'warning');
    if($("#desc-event").val() === '')
		swal('','Ingresa la descripción', 'warning');
	else {
		var formData = new FormData(this);
		var inputValue = formData.get("file_img");
		//console.log(inputValue);

			 $.ajax({  
				  url: base_url+"AdminController/ajax_upload",   
				  //base_url() = http://localhost/tutorial/codeigniter  
				  method:"POST",  
				  data:new FormData(this),  
				  contentType: false,  
				  cache: false,  
				  processData:false,  
				  success:function(data)  
				  {  
					  //console.log(data);
					  
					AddEvent();
				  }  
			 });  
		}
		  
   });  

   $('#form_img2').on('submit', function(e){  
			e.preventDefault();  
			if($("#nom-event-edit").val() === '')
			swal('','Ingresa el nombre del evento', 'warning');
		else if($("#lug-event-edit").val() === '')
			swal('','Ingresa el lugar', 'warning');
		if($("#desc-event-edit").val() === '')
			swal('','Ingresa la descripción', 'warning');
		else {
			if($("#file_img2").val() === ''){
				EditEvent();
			}else{
				alert('nueva img'+imagen);
				var formData = new FormData(this);
			var inputValue = formData.get("file_img");
			//console.log(inputValue);

		 $.ajax({  
			  url: base_url+"AdminController/ajax_upload",   
			  //base_url() = http://localhost/tutorial/codeigniter  
			  method:"POST",  
			  data:new FormData(this),  
			  contentType: false,  
			  cache: false,  
			  processData:false,  
			  success:function(data)  
			  {  
				  //console.log(data);
				  
				EditEvent();
			  }  
		 });
			}
			/*  */
	}
	  
});  

    $("#btn_newEvent").on('click', function(event) {
		$("#new-event-modal").modal('show'); 
		$("#edit-event-modal").modal("hide"); 
	});

    $(".edit-link").on('click', function(event) {
		
		SeeEvent(this.id);
		$("#edit-event-modal").modal('show'); 
		$("#new-event-modal").modal("hide"); 

	});

	$(".remove-link").on('click', function(event) {
				
		var id=this.id;
		
		swal({
            title: 'Confirmación',
            text: '¿Desea dar de baja este evento?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar',
            reverseButtons: true})
        .then(function(result){
			removeEvent(id);
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

/*editar*/
function EditEvent()
{
		var id = $("#id-event-edit").val();
		var nombre = $("#nom-event-edit").val().toLowerCase();
		var lugar = $("#lug-event-edit").val();
        var descripcion = $("#desc-event-edit").val().toLowerCase();
		var dia = $(".dia-event-edit").val();
        var mes = $(".mes-event-edit").val();
        var anio = $(".anio-event-edit").val();
        var hora = $(".hora-event-edit").val();
        var minutos = $(".min-event-edit").val();
		var categoria = $(".cat-event-edit").val();
		//var imagen= $('#file_img').val();
		var fecha=anio+'-'+mes+'-'+dia;
		 hora=hora+':'+minutos;

      
		$.ajax({
			url: 'edit-event',
			type: 'POST',
			dataType: 'json',
			data:
			{
				id:id,
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
					sweetAlert('Exito','Evento editado', 'success', 2000, false);
					setTimeout(function(){ 
						location.href = base_url + "gestion-eventos";          
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

/*Eliminar evento */
function removeEvent(idR)
{
		$.ajax({
			url: 'remove-event',
			type: 'POST',
			dataType: 'json',
			data:
			{
				id:idR
			},
			success : function(json) {
			if(json.status == "200") {
					sweetAlert('Exito','Evento eliminado', 'success', 2000, false);
					setTimeout(function(){ 
						location.href = base_url + "gestion-eventos";          
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


function SeeEvent(id)
{
		
		$.ajax({
			url: 'get-event',
			type: 'POST',
			dataType: 'json',
			data:
			{
				id_even: id
			},
			success : function(json) {
				if(json.status == "200") {
					console.log(json.evento[0]);
					$("#id-event-edit").val(json.evento[0].id_even);
					$("#nom-event-edit").val(json.evento[0].nom_even);
					$("#lug-event-edit").val(json.evento[0].lugar_even);
					$("#desc-event-edit").val(json.evento[0].desc_even);
					$(".dia-event-edit option[value="+(json.evento[0].fec_even).substring(8, 10)+"]").attr('selected', 'selected');
					$(".mes-event-edit option[value="+(json.evento[0].fec_even).substring(5, 7)+"]").attr('selected', 'selected');
					$(".anio-event-edit option[value="+(json.evento[0].fec_even).substring(0, 4)+"]").attr('selected', 'selected');

					$(".hora-event-edit option[value="+(json.evento[0].hora_even).substring(0, 2)+"]").attr('selected', 'selected');
					$(".min-event-edit option[value="+(json.evento[0].hora_even).substring(3, 5)+"]").attr('selected', 'selected');
					$("#actual-imagen-even").html('<img  width="150px" src='+base_url+'upload/'+json.evento[0].imagen_even+' alt="Card image cap">');

				}

				else {
					swal('Error','Error', 'error');
				}
			},
			error : function(xher){console.log(xher);}
		});
	

		
} 