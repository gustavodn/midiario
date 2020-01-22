function compartido(){
    var parametros={
       "compartido": $("#compartido").val(),
    }
    $.ajax({
       data: parametros,
       url:"consultas/listar_compartidos.php",
       type:"POST",
       beforeSend: function(){
           $("#lista").html('<center><img src="img/ajax-loader.gif" width="20" heigh="20"></center>');
       },
       success: function(vista){
           $("#lista").html(vista);
        }
       });
      }

function estado(){
    var parametros={
       "estado": $("#estado").val(),
    }
    $.ajax({
       data: parametros,
       url:"consultas/listar_emocional.php",
       type:"POST",
       beforeSend: function(){
           $("#lista").html('<center><img src="img/ajax-loader.gif" width="20" heigh="20"></center>');
       },
       success: function(vista){
           $("#lista").html(vista);
        }
       });
      }