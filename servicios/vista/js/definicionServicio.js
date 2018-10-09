$(document).ready(ini);

function ini() {
	$("#guardar").click(guardar);
	$("#buscar").click(buscarPorMenu);
	/*$("cancelar").click(cancelar);
	$("subir").click(subir);*/

}

function cancelar() {
	$("#menu")[0].selectedIndex;
	$("#titulo").val("");
	$("#subtitulo").val("");
	$("#detalle").val("");
}
consultarMenuServicios();
var valueOption ;

$(document).ready(function(){
	$("#menu").change(function(){
		valueOption = $('select[id=menu]').val();
	});
});

function consultarMenuServicios() {
	
	$.getJSON({
            type:'POST',
            url: 'buscarMenuServicios.php',
            datatype: 'json'
        })

        // Compruebo si me esta trayendo los valores

        .done(function(data){
           for(i = 0; i < data.length; i++) {
           	     $("#menu").append("<option value='"+data[i].id+"'>"+data[i].nombre+"</option>");
           	}
        });
    return false;
}

$(document).ready(function(e){


    $("#formup").on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var file    = $("#file").val();
        var menu = $( "#menu option:selected" ).text();
        var id   = valueOption;
        var titulo = $("#titulo").val();
        var subtitulo = $("#subtitulo").val();
        
        

        var detalle = $("#detalle").val();
        formData.append("id", id);
         formData.append("menu", menu);
         formData.append("titulo", titulo);
         formData.append("subtitulo", subtitulo);
         formData.append("detalle", detalle);
         formData.append("file", file);
         alert("titulo::: " + titulo);
        $.ajax({
            type: 'POST',
            url: 'guardarDefinicionServicios.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#guardar').attr("disabled","disabled");
                $('#formup').css("opacity",".5");
            },
            success: function(msg){
            	alert("msf::: " + msg);
                $('#resultado').empty();
                if(msg == "si") {
                    alert("entra");
                    $('#resultado').append('<span style="font-size:18px;color:#EA4335">El titulo ya existe en la base de datos</span>');
                    $("#titulo").val("");
                    $("#titulo").css("background-color", "#FFFFCC");
                    $("#titulo").focus();
                    
                } else {
                    if(msg == "true"){
                        $('#formup')[0].reset();
                        $('#resultado').append('<span style="font-size:18px;color:#34A853">Los datos se guardaron correctamente</span>');
                        
                    }else{
                        $('#resultado').append('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                    }    
                }
                $('#formup').css("opacity","");
                $("#guardar").removeAttr("disabled");
                
            }
        });
    });
    
    //file type validation
    $("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });


});

function buscarPorMenu() {
    var idMenu = valueOption;
    alert("idMenu:: " +idMenu);

    $.getJSON({
            type:'POST',
            url: 'buscarPorMenu.php',
            data : {idMenu :idMenu},
            datatype: 'json'
        })

        // Compruebo si me esta trayendo los valores

        .done(function(data){
           alert(data);
           var tBody = "<tbody>";
           var tCbody = "</tbody>";
           var body = "";
           var tags = "";
           $("#datatable tbody tr").remove();
           for(i = 0; i < data.length; i++) {
                  tags ="<td><button class='btn btn-primary btn-xs glyphicon glyphicon-pencil' data-title='Edit' onclick='eliminar("+data[i].id+")'  /></td>";   
                  body = body + "<tr><td>"+data[i].titulo+"</td><td>"+data[i].subtitulo+"</td><td>"+data[i].detalle+"</td>"+"</td><td><a href='#' onclick='verImagenes("+data[i].id+");'>Ver Imagenes</a></td>"+tags+"<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button onclick=eliminar('"+data[i].id+"') class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td></tr>";
                  
             
            }

           $("#datatable").append(tBody).append(body).append(tCbody);

            
          
        });
        return false;
}

function verImagenes(idTitulo){

 var idMenu = valueOption;
    alert("idMenu:: " +idMenu);

    $.getJSON({
            type:'POST',
            url: 'verImagenes.php',
            data : {idMenu :idMenu, idTitulo, idTitulo},
            datatype: 'json'
        })

        // Compruebo si me esta trayendo los valores

        .done(function(data){
           alert(data);
           var tBody = "<tbody>";
           var tCbody = "</tbody>";
           var body = "";
           var tags = "";
           
           var div = "";
           alert("tamañp::" +data.length);
           $("#datatable tbody tr").remove();
           for(i = 0; i < data.length; i++) {
                if(i == 0) {
                  tags ="<td><button class='btn btn-primary btn-xs glyphicon glyphicon-pencil' data-title='Edit' onclick='eliminar("+data[i].id+")'  /></td>";   
                  body = body + "<tr><td>"+data[i].titulo+"</td><td>"+data[i].subtitulo+"</td><td>"+data[i].detalle+"</td>"+"</td><td><a href='#' onclick='verImagenes("+data[i].id+");'>Ver Imagenes</a></td>"+tags+"<td><p data-placement='top' data-toggle='tooltip' title='Delete'><button onclick=eliminar('"+data[i].id+"') class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button></p></td></tr>";
                
                  
                }
                div = div + "<div title='"+data[i].nombre_imagen+"'><img src='"+data[i].path+""+data[i].nombre_imagen+"' width='400' height='300' /></div>";
                
             
            }


           $("#datatable").append(tBody).append(body).append(tCbody);
           $("#slide").append(div);

            
          
        });
        return false;   
}

$(document).ready(function() {
    $('#slide').bbslider({
        controls:   true,
        transition: 'slide',
        easing:     'easeInOutExpo',
        duration:   1000
    });
});