
function listarPlanillas(){

    datos = {
        'op' : 'listarPlanillas'
    };

    $.ajax({
        url:'controllers/planilla.controller.php',
        type:'GET',
        data: datos,
        success: function(e){
            

            $("#tabla-planillas").DataTable().destroy();

            // Agregar datos en cuerpo de la tabla usuario
            $("#datos-planillas").html(e);

            // Volver a generar el dataTable
            $("#tabla-planillas").DataTable({
                paging          :true,
                lengthChange    : true,
                pageLenght      : 8,
                language        : { url : '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'},
                searching       : false,
                ordering        : false,
                info            : true,
                autoWidth       : false,
                responsive      : true,
                dom             : domTableComplete,
                buttons         : buttonsTableMaster
            });

             // Capturar el ID de la planilla al hacer clic en una fila
             $('#tabla-planillas tbody').on('click', 'tr', function () {
                var idPlanilla = $(this).find('td').eq(0).text(); // Obtiene el ID de la primera columna

                console.log(idPlanilla);

                // Llamar a la función para cargar los detalles de la planilla
                listarDetPlanillas(idPlanilla);

                // Mostrar la tabla de detalle de la planilla
                $('#detalle-planilla').show();
            });
        }
    });
} 

function listarDetPlanillas(idPlanilla) {
    datos = {
        'op': 'listarDetallePlanillas',
        'idplanilla': idPlanilla // Pasar el ID de la planilla
    };

    console.log(datos);

    $.ajax({
        url: 'controllers/planilla.controller.php',
        type: 'GET',
        data: datos,
        success: function (e) {
            $("#tabla-detallePlanillas").DataTable().destroy();

            // Agregar datos en el cuerpo de la tabla detalle
            $("#datos-detallePlanillas").html(e);

            console.log(e);

            // Volver a generar el dataTable
            $("#tabla-detallePlanillas").DataTable({
                paging: true,
                lengthChange: true,
                pageLength: 8,
                language: { url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json' },
                searching: false,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: true,
                dom: domTableComplete,
                buttons: buttonsTableMaster
            });
        }
    });
}

listarPlanillas();