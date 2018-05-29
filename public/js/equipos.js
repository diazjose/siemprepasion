$(document).ready(function(){
  $("#buscar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#Table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
function elimarSiNo(id, tr){
	var eliminar = confirm('¿Esta Seguro de Eliminar este Registro?');
	var id = id;
	var tr = tr;
	
	if (eliminar) {
		$.ajax({
	            type: "POST",
	            url: "equipos/eliminar",
	            data: 'id='+id,
	            success: function(resp) {            
	                		if (resp == 1) {
	                			$('#'+tr).remove();
	                		}else{
	                			alert('No se puede eliminar este equipo');
	                		};

	                     }
	        });
	};			
}

function selEquipo(id, nombre, fecha, estado){

	document.getElementById('Eid_equipo').value=id;
	document.getElementById('Enombre').value=nombre;
	document.getElementById('Efecha').value=fecha; 
	document.getElementById('Eestado').checked=estado; 
			
}

function activar(id, viene){
	var id = id;
	var boton = viene;

	$.ajax({
		type: "POST",
	            url: "equipos/activar",
	            data: 'id='+id,
	            
	            success: function() {            
	                		if (boton == 'off') {
									$("#on").addClass("btn btn-primary");
									$("#off").addClass("btn btn-light");
							}else{
								$("#off").addClass("btn btn-primary");
								$("#on").addClass("btn btn-light");
							};
								
	                	}	
	});

}