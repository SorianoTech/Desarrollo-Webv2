<script>
    $(function () {
        var dialog, form,
            alerta = $("#alerta"),
            fecha = $("#fecha"),
            proyecto = $("#proyecto"),
            allFields = $([]).add(alerta).add(fecha).add(proyecto);

        function guardar_alertas() {
            var alerta = $('#alerta').val();
            var fecha = $('#fecha').val();
            var proyecto = $('#proyecto').val();
            $.post("includes/guardar_alertas.php", {alerta: alerta, fecha: fecha, proyecto: proyecto})
                .done(function (data) {
                    dialog.dialog("close");
                    $("#ul_lista_alertas").prepend(data);
                });
        }

        dialog = $("#formulario_alertas").dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
                "Crear Alerta": guardar_alertas,
                Cancelar: function () {
                    dialog.dialog("close");
                }
            },
            close: function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = dialog.find("#form_alertas").on("submit", function (event) {
            event.preventDefault();
            guardar_alertas();
        });

        $("#crear_alerta").button().on("click", function () {
            dialog.dialog("open");
        });
    });
</script>