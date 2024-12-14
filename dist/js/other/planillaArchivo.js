function importarPlanilla() {
    var formData = new FormData();
    var archivo = $("#archivoExcel")[0].files[0];

    if (!archivo) {
        alertWarning('Debe seleccionar un archivo Excel para importar.');
        return;
    }

    formData.append("op", "importarPlanilla");
    formData.append("archivoExcel", archivo);

    sweetAlertConfirmQuestionSave("¿Está seguro de importar este archivo?").then((confirm) => {
        if (confirm.isConfirmed) {
            // Mostrar la animación de subida
            $("#uploadAnimation").show();

            $.ajax({
                url: 'controllers/planillaArchivo.controller.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(response) {
                    $("#uploadAnimation").hide(); // Ocultar la animación

                    let res = JSON.parse(response);
                    if (res.success) {
                        alertSuccess(res.message);
                    } else {
                        alertError(res.message);
                    }
                },
                error: function(xhr, status, error) {
                    $("#uploadAnimation").hide(); // Ocultar la animación
                    alertError("Error al importar el archivo: " + error);
                }
            });
        }
    });
}

// Actualizar el texto del label dinámicamente
$("#archivoExcel").on("change", function () {
    var archivo = $(this)[0].files[0];
    var label = $("label[for='archivoExcel']");
    if (archivo) {
        label.text(archivo.name); // Mostrar el nombre del archivo seleccionado
    } else {
        label.text("Seleccionar archivo..."); // Texto predeterminado
    }
});
