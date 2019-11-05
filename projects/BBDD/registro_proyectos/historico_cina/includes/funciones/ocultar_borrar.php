<script>
    function abrir_botones_alertas(id_alerta) {
            $(".boton_borrar_posponer_" + id_alerta).toggle();
    }
    
    function abrir_botones_proyectos_alertas(id_proyecto) {
        $( ".lista_alertas_dentro_proyectos_" +id_proyecto).toggle();
    }
    
    function abrir_botones_proyectos_logs(id_proyecto) {
        $( ".lista_logs_dentro_proyectos_" +id_proyecto).toggle();
    }
    
    
    var id_proyecto = 0;
    
    function verproyecto(){
        var id = $("#select_logs").val();
        id_proyecto = id;
//        alert(id);
        $.ajax({
          method: "POST",
          url: "includes/recuperar-logs.php",
          data: { id: id}
        }).done(function(dato) {
            $("#lista_logs").html(dato);
          });        
          
        $.ajax({
          method: "POST",
          url: "includes/recuperar-alertas.php",
          data: { id: id}
        }).done(function(dato) {
            $("#listado_alertas").html(dato);
          });          
    }
    
    function borrar_logs(id){
        $.ajax({
          method: "POST",
          url: "includes/borrar_logs.php",
          data: { id: id}
        }).done(function(dato) {
            if(dato == 1){
                alert("Se ha producido un error...").hide(600);
            } else {
                $(".li_logs_borrados_"+id).hide(800),
                alert("Log eliminado correctamente...");
            }
          });                
    }
</script>