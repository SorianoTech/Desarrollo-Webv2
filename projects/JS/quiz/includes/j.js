function obtenerPreguntas() {
    $(document).ready(function () {
        $.ajax({
            url: "obtenerPreguntas.php", success: function (result) {
                $(".selector-pregunta").html(result);
            }
        });
        $("#boton").hide();
    });
}