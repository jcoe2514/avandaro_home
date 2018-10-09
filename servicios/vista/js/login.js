$(document).ready(ini);

function ini() {
	//$("#entrar").click(validar);
	var form = $(".form-login");
	form.bind("submit", function(){
         $.ajax({
         	    type : form.attr('method'),
         	    url  : form.attr('action'),
         	    data : form.serialize(),
         	    beforeSend : function() {
         	    	$("#entrar").text("enviando...");
         	    	$("#entrar").attr("disabled", true);
         	    },
         	    complete:function(data) {
         	    	$("#entrar").text("Entrar");
         	    	$("#entrar").attr("disabled", false);
         	    },
         	    success:function(data){
         	    	$("#resultado").empty();
					
					if(data == "true") {
						document.location.href = "admin.php";
					} else {
						
						$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡El usuario o password incorrecto!</b></div>");
					}

         	    },
         	    error:function(data) {

         	    }
         });
         return false;
	});
	
}

function validar() {

	var usuario = $("#usuario").val();
	var password = $("#password").val();

	$.ajax({
		url     : "validar.php",
		success : function(result){
			$("#resultado").empty();
			
			if(result == "true") {
				document.location.href = "admin.php";
			} else {
				
				$("#resultado").append("<div class='alert alert-danger' role='alert'><b>¡El usuario o password incorrecto!</b></div>");
			}
		},
		data : {
			
			usuario : usuario,
			password : password
		},
		type: "POST"
	});
}