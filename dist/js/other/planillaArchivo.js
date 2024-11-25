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
            $.ajax({
                url: 'controllers/planillaArchivo.controller.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(response) {
                    let res = JSON.parse(response);
                    if (res.success) {
                        alertSuccess(res.message);
                    } else {
                        alertError(res.message);
                    }
                },
                error: function(xhr, status, error) {
                    alertError("Error al importar el archivo: " + error);
                }
            });
        }
    });
}
