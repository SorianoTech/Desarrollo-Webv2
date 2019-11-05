    var id_proyecto = 0;
    
    
    function crearproyecto(){
        $("#nuevoproyecto").show();
    }

    function guardarproyecto(){
        var nombre = $("#texto_proyecto").val();
        $.ajax({
          method: "POST",
          url: "includes/guardar-proyecto.php",
          data: { nombre: nombre}
        }).done(function(dato) {
            if(dato == 1){
                $("#error").show();
                $("#error").html("<i class=\"fas fa-exclamation-triangle\"></i> Se ha producido un error...");
                $("#error").hide(6000);
            } else {
                $("#buscador").prepend(dato);
                $("#ok").show();
                $("#ok").html("<i class='fas fa-check-circle'></i> Proyecto guardado correctamente...");
                $("#ok").hide(6000);
            }
          });
    }

    function borraralerta(id){
        $.ajax({
          method: "POST",
          url: "includes/borrar-alerta.php",
          data: { id: id}
        }).done(function(dato) {
            if(dato == 1){
                $("#error").show();
                $("#error").html("<i class=\"fas fa-exclamation-triangle\"></i> Se ha producido un error...");
                $("#error").hide(6000);
            } else {
                $("#ok").show();
                $("#ok").html("<i class='fas fa-check-circle'></i> Alerta suprimida correctamente...");
                $("#ok").hide(6000);
                $("#alerta_"+id).hide(800);
                $("#alerta_proyectos_"+id).hide(800);
            }
          });                
    }
    
    $( function() {
      $( "#tabs" ).tabs({
        collapsible: true
      });
    } );
    
    function verproyecto(){
        $("#todo").hide(300);
        $("#todo").show(300);
        $("#alertas").hide(500);
        $("#texto_logs").val("");
        var id = $("#buscador").val();
        id_proyecto = id;
        $.ajax({
          method: "POST",
          url: "includes/recuperar-logs.php",
          data: { id: id}
        }).done(function(dato) {
            $("#listado_logs").html(dato);
          });        
          
        $.ajax({
          method: "POST",
          url: "includes/recuperar-alertas.php",
          data: { id: id}
        }).done(function(dato) {
            $("#listado_alertas").html(dato);
          });          
    }
    
    
    function guardar_logs(){
        var log = $("#texto_logs").val();
        $.ajax({
          method: "POST",
          url: "includes/guardar-logs.php",
          data: {log: log, proyecto: id_proyecto}
        }).done(function(dato) {
            if(dato == 1){
                $("#error").show();
                $("#error").html("<i class=\"fas fa-exclamation-triangle\"></i> Se ha producido un error, el LOGS no se ha podido guardar...");
                $("#error").hide(6000);                
            } else {
                $("#listado_logs table").prepend(dato);
            }
          });
          $("#texto_logs").val("");
          $("#log_"+id_proyecto+"_0").hide(300);
    }
    
    
        function guardar_alertas(){
        var alerta = $("#texto_alertas").val();
        var fecha = $("#fecha_alerta").val();
        $.ajax({
          method: "POST",
          url: "includes/guardar-alertas.php",
          data: {alerta: alerta, proyecto: id_proyecto, fecha: fecha}
        }).done(function(dato) {
            if(dato == 1){
                $("#error").show();
                $("#error").html("<i class=\"fas fa-exclamation-triangle\"></i> Se ha producido un error, La Alerta no se ha podido guardar...");
                $("#error").hide(6000);                
            } else {
                $("#listado_alertas table").prepend(dato);
            }
          });
          $("#texto_alertas").val("");
          $("#fecha_alerta").val("");
          $("#alerta_"+id_proyecto+"_0").hide(300);
    }