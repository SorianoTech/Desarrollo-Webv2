<script>
    $(function () {
        var dialog, form,
            nombre = $("#nombre"),
            allFields = $([]).add(nombre);

        function guardar_proyectos() {
            var nombre = $('#nombre').val();
            $.post("includes/guardar_proyectos.php", {proyecto: nombre})
                .done(function (data) {
                    dialog.dialog("close");
                    $("#ul_lista_proyectos").prepend(data);
                });
        }

        dialog = $("#formulario_proyectos").dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
                "Crear Proyecto": guardar_proyectos,
                Cancelar: function () {
                    dialog.dialog("close");
                }
            },
            close: function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = dialog.find("#form_proyectos").on("submit", function (event) {
            event.preventDefault();
            guardar_proyectos();
        });

        $("#crear_proyecto").button().on("click", function () {
            dialog.dialog("open");
        });
    });
</script>