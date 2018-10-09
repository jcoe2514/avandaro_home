$(document).ready(ini);

function ini() {
	$("#guardar").click(enviarDatos);
	$("#buscar").click(buscar);
	$("cancelar").click(cancelar);
	$("#actualizar").hide();
	$("#actualizar").click(actualizar);

}
function cancelar() {
	$("#nombre").val("");
	$("#icon").val("");
	$("#url").val("");
	$("#status").attr('checked', false);

}
function enviarDatos() {
	
	var nombre = $("#nombre").val();
	var icon   = $("#icon").val();
	var url    = $("#url").val();
	var status = $("#status").val();

	
	
    $("#resultado").empty();
	    if(status == 'on') {
	    	status = 1;
	    } else {
	    	status = 0;
	    }
		$.ajax({
			url     : "insertarMenuServicios.php",
			success : function(result){
				

				/*if(result == 'si') {
					$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡El usuario ya existe en la base!</b></div>");
				} else {*/
					
					if(result == 1) {
						$("#resultado").append("<div class='alert alert-info' role='alert'><b>¡EL menú se guardo correctamente!</b></div>");
						cancelar();
						buscarTodo();
						$("#status").attr('checked', false);
						$("#datatable tbody tr").remove();
						$("#guardar").show();

					} else {
						$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡No se pudo registrar el menú!</b></div>");
					}
				//}
					
			},
		    data : {
			    nombre  : nombre,
			    icon    : icon  ,
			    url     : url   ,
			    status  : status
		    },
		    type: "POST"
	    });
	
	return false;

}

function buscarTodo()  {
    
	$.getJSON({
            type:'POST',
            url: 'buscarMenuServicios.php',
            datatype: 'json'
        })

        // Compruebo si me esta trayendo los valores

        .done(function(data){
    
           var tBody = "<tbody>";
           var tCbody = "</tbody>";
           var body = "";
           var tags = "";
           $("#datatable tbody tr").remove();
           for(i = 0; i < data.length; i++) {
           	      tag = "<td><input type='button' onclick='editar("+data[i].id+");'  value='Editar' /></td>";
           	      
           	      body = body + "<tr><td>"+data[i].nombre+"</td><td>"+data[i].icon+"</td><td>"+data[i].url+"</td><td>"+data[i].status+"</td>"+tag+"<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button onclick=eliminar('"+data[i].id+"') class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td></tr>";
           	      
           	 
           	}

           $("#datatable").append(tBody).append(body).append(tCbody);

            
          
        });
        return false;
}

function eliminar(id) {
	$.ajax({
			url     : "eliminarMenuServicios.php",
			success : function(result){

				
					if(result == "true") {
						$("#resultado").append("<div class='alert alert-info' role='alert'><b>¡EL usuario se elmininp correctamente!</b></div>");
						cancelar();
						buscarTodo();

					} else {
						$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡No se pudo eliminar el usuario!</b></div>");
					}
				
					
			},
		    data : {
			    id : id
		    },
		    type: "POST"
	    });

	return  false;

}

function buscar() {
	var name = $("#nombre").val();
	
	$.getJSON({
            type:'POST',
            url: 'buscarEspesificaMenu.php',
            data : {nombre : name},
            datatype: 'json'
        })

        // Compruebo si me esta trayendo los valores

        .done(function(data){
          
           var tBody = "<tbody>";
           var tCbody = "</tbody>";
           var body = "";
           $("#datatable tbody tr").remove();
           
           tag = "<td><input type='button' onclick='editar("+data[0].id+");'  value='Editar' /></td>";

          /* for(i = 0; i < data.length; i++) {
           	  if(data[i].usuario= usua) {
           	  	  alert(data[i].nombre);*/
           	      body = body + "<tr><td>"+data[0].nombre+"</td><td>"+data[0].icon+"</td>"+"</td><td>"+data[0].url+"</td><td>"+data[0].status+"</td>"+tag+"<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button onclick=eliminar("+data[0].id+") class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td></tr>";
           	    /*  break;	
           	  }
           	  
           	  
           }*/

           $("#datatable").append(tBody).append(body).append(tCbody);

            
          
        });
        
        return false;
}

function editar(id) {
	
	
	$.getJSON({
			url     : "buscarIdMenuServicio.php",
			datatype: 'json',
			success : function(result){

				
				var nombre = $("#nombre").val(result[0].nombre);
				$("#icon").val(result[0].icon);
				$("#url").val(result[0].url);
				
				if(result[0].status == 'ACTIVO') {
				    $("#status").attr('checked', true);
				} else {
					$("#status").attr('checked', false);
				}

				$("#id").val(id);


				buscar(nombre);

				$("#guardar").hide();
				$("#actualizar").show();
			
				
					
			},
		    data : {
			    id : id
		    },
		    type: "POST"
	    });
        return false;
}

buscarTodo();

function actualizar() {

    var nombre = $("#nombre").val();
	var icon   = $("#icon").val();
	var url    = $("#url").val();
	var status;
	var id     = $("#id").val();
	
	if($('#status').prop('checked')) {
		status = 1;
	} else {
		status =  0;
	}

	

	$.ajax({
			url     : "actualizarMenuServicios.php",
			success : function(result){
				$("#resultado").empty();

				if(result == "true") {
					$("#datatable tbody tr").remove();
					$("#resultado").append("<div class='alert alert-info' role='alert'><b>¡EL menú se actualizo correctamente!</b></div>");
					cancelar();
					buscarTodo();
					$("#guardar").show();
					$("#actualizar").hide();

				} else {
					$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡EL menú no se pudo actualizo!</b></div>");
				}

			},
		    data : {
		    	id      : id    ,
			    nombre  : nombre,
			    icon    : icon  ,
			    url     : url   ,
			    status  : status
		    },
		    type: "POST"
	    });
	return false;
}


