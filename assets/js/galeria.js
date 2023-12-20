
$( document ).ready(function() {
    //alert('desde jquery');
  });

  $(".btn-calendar").click(function()
{
    //alert('desde btn calendar');
    string=(this).id;
    var idImg = string.split("-");
    var idUnique = idImg[idImg.length - 1];
    
    SeeImg(idUnique);    

});

function SeeImg(id)
{
		
		$.ajax({
			url: 'get-img',
			type: 'POST',
			dataType: 'json',
			data:
			{
				id_img: id
			},
			success : function(json) {
				if(json.status == "200") {
					//console.log(json.imagen[0]);
					console.log(json.imagen.nombre_img);
					$("#imagen-modal").html
    			("<img class='img-modal'  src='upload/galeria/"+json.imagen.nombre_img+"' width='800px'>");
				}

				else {
					swal('Error','Error', 'error');
				}
			},
			error : function(xher){console.log(xher);}
		});
	

		
} 

/*checasr si podemos aniadir un media query para adaptar el tmanio en pc y movil */