<script>
    $(function () {
        var dialog, form,
            log = $("#log"),
            proyecto = $("#proyecto_log"),
            allFields = $([]).add(log).add(proyecto);

        function guardar_logs() {
            var log = $('#log').val();
            var proyecto = $('#proyecto_log').val();
            $.post("includes/guardar_logs.php", {log: log, proyecto: proyecto})
                .done(function (data) {
                    dialog.dialog("close");
                    $("#ul_lista_logs").prepend(data);
                });
        }

        dialog = $("#formulario_logs").dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
                "Crear Log": guardar_logs,
                Cancelar: function () {
                    dialog.dialog("close");
                }
            },
            close: function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = dialog.find("#form_logs").on("submit", function (event) {
            event.preventDefault();
            guardar_logs();
        });

        $("#crear_log").button().on("click", function () {
            dialog.dialog("open");
        });
    });
</script>