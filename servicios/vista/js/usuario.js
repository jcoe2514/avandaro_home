$(document).ready(ini);

function ini() {
	$("#guardar").click(enviarDatos);
	$("#buscar").click(buscar);
	$("cancelar").click(cancelar);

}

function cancelar() {
	$("#nombre").val("");
	$("#usuario").val("");
	$("#password").val("");
	$("#confirmar").val("");
}

function eliminar(usuario) {
	
	$.ajax({
			url     : "eliminarUsuario.php",
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
			    usuario : usuario
		    },
		    type: "POST"
	    });

	return  false;

}

function enviarDatos() {
	
	var nombre = $("#nombre").val();
	var usuario = $("#usuario").val();
	var password = $("#password").val();
	var confirmar = $("#confirmar").val();
    $("#resultado").empty();
	
	if(confirmar == password) {
		$.ajax({
			url     : "insertar.php",
			success : function(result){

				if(result == 'si') {
					$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡El usuario ya existe en la base!</b></div>");
				} else {
					if(result == "true") {
						$("#resultado").append("<div class='alert alert-info' role='alert'><b>¡EL usuario se guardo correctamente!</b></div>");
						cancelar();
						buscarTodo();
						$("#datatable tbody tr").remove();

					} else {
						$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡No se pudo registrar el usuario!</b></div>");
					}
				}
					
			},
		    data : {
			    nombre  : nombre,
			    usuario : usuario,
			    password : password
		    },
		    type: "GET"
	    });
	} else {
		$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡El password no coinside!</b></div>");
	}
	return false;

}

function buscarTodo()  {
    
	$.getJSON({
            type:'POST',
            url: 'buscarTodos.php',
            
            datatype: 'json'
        })

        // Compruebo si me esta trayendo los valores

        .done(function(data){
          
           var tBody = "<tbody>";
           var tCbody = "</tbody>";
           var body = "";
           var tags ="<td><p data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='.bootstrap-modal' ><span class='glyphicon glyphicon-pencil'></span></button></p></td>";
           $("#datatable tbody tr").remove();
           for(i = 0; i < data.length; i++) {
           	  
           	      body = body + "<tr><td>"+data[i].nombre+"</td><td>"+data[i].usuario+"</td>"+tags+"<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button onclick=eliminar('"+data[i].usuario+"') class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td></tr>";
           	      
           	 
           	}

           $("#datatable").append(tBody).append(body).append(tCbody);

            
          
        });
        return false;
}

buscarTodo();



function buscar() {
	var usua = $("#usuario").val();
	
	
	$.getJSON({
            type:'POST',
            url: 'buscarUsuario.php',
            data : {usuario : usua},
            datatype: 'json'
        })

        // Compruebo si me esta trayendo los valores

        .done(function(data){
           
           var tBody = "<tbody>";
           var tCbody = "</tbody>";
           var body = "";
           $("#datatable tbody tr").remove();
           
           var tags ="<td><p data-placement='top' data-toggle='tooltip' title='Editar'><button class='btn btn-primary btn-xs' data-title='Editar' data-toggle='modal' onclick=opneDialog(); data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button></p></td>";

          /* for(i = 0; i < data.length; i++) {
           	  if(data[i].usuario= usua) {
           	  	  alert(data[i].nombre);*/
           	      body = body + "<tr><td>"+data[0].nombre+"</td><td>"+data[0].usuario+"</td>"+tags+"<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button onclick=eliminar('"+data[0].usuario+"') class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td></tr>";
           	    /*  break;	
           	  }
           	  
           	  
           }*/

           $("#datatable").append(tBody).append(body).append(tCbody);

            
          
        });
        
        return false;
}
