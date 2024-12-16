var numeroDocPlanilla = localStorage.getItem("nomuserBoleta");

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
                responsive: true
            });
        }
    });
}

function listarDetPlanillasDni(numeroDocPlanilla) {

    console.log(localStorage.getItem("nomuserBoleta"));
    datos = {
        'op': 'buscardetalleDni',
        'numeroDoc': numeroDocPlanilla // Pasar el ID de la planilla
    };

    console.log(datos);

    $.ajax({
        url: 'controllers/planilla.controller.php',
        type: 'GET',
        data: datos,
        success: function (e) {
            $("#tabla-consulta").DataTable().destroy();

            // Agregar datos en el cuerpo de la tabla detalle
            $("#datos-consulta").html(e);

            console.log(e);

            // Volver a generar el dataTable
            $("#tabla-consulta").DataTable({
                paging: true,
                lengthChange: true,
                pageLength: 8,
                language: { url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json' },
                searching: false,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: true
            });
        }
    });
}

function listarBoletasUsuarios() {
    var anioConsulta = $("#anioConsultasUnicas").val();
    var mesConsulta = $("#mesConsultasUnicas").val();

    // Mostrar el spinner en el tbody
    $("#datos-consulta").html(`
        <tr>
            <td colspan="10" class="text-center">
                <i class="fas fa-spinner fa-spin" style="font-size: 24px;"></i> Cargando datos, por favor espere...
            </td>
        </tr>
    `);

    var datos = {
        'op': 'buscarConsultaUsuarios',
        'numeroDoc': numeroDocPlanilla,
        'anio': anioConsulta,
        'mes': mesConsulta
    };


    $.ajax({
        url: 'controllers/planilla.controller.php',
        type: 'GET',
        data: datos,
        success: function (response) {
            // Destruir el DataTable si ya fue inicializado
            if ($.fn.DataTable.isDataTable("#tabla-consulta")) {
                $("#tabla-consulta").DataTable().destroy();
            }

            // Reemplazar el contenido del tbody con la respuesta
            $("#datos-consulta").html(response);

            console.log(response, "response");

            $("#tabla-consulta").DataTable({
                paging: true,
                lengthChange: true,
                pageLength: 8,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json',
                    emptyTable: ""  // Evitar el mensaje predeterminado de "No hay datos"
                },
                searching: false,
                ordering: false,
                info: true,
                autoWidth: false,
                responsive: true,
                dom: domTableComplete,
                buttons: buttonsTableMaster,
                drawCallback: function(settings) {
                    // Mostrar u ocultar el spinner según el contenido de la tabla
                    if (settings.aoData.length === 0) {
                        // Mostrar el spinner en el tbody
                        $("#datos-consulta").html(`
                            <tr>
                                <td colspan="10" class="text-center">
                                    <i class="fas fa-spinner fa-spin" style="font-size: 24px;"></i> Cargando datos, por favor espere...
                                </td>
                            </tr>
                        `);
                    } else {
                        // Si hay datos, ocultar el spinner
                        $("#spinner").hide();
                    }
                }
            });
            
        },
        error: function () {
            // Mostrar mensaje de error en el tbody
            $("#datos-consulta").html(`
                <tr>
                    <td colspan="10" class="text-center">
                        Error al cargar los datos. Intente nuevamente.
                    </td>
                </tr>
            `);
        }
    });
}

function listarConsultasGeneral(){
    var tabla = $("#tabla-consultasGeneral").DataTable();
    tabla.destroy();    

    tabla = $("#tabla-consultasGeneral").DataTable({
        "processing"    : true,
        "order"         : [[0, "desc"]],
        "serverSide"    : true,
        "autoWidth"     : false,
        "sAjaxSource"   : 'controllers/planilla.controller.php?op=listarplanillasGeneral',
        "lengthChange"  : true,
        "pageLength"    : 8,
        "language"      : { url : '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'},
        "dom"           : domtableBasic,
        "buttons"       : buttonsTableMaster,
        "columnDefs"    : columnDefsGeneral
    });
} 

function buscarDetallePlanilla() {
    let numeroDoc = $("#numeroDoc").val().trim();
    let nombresApellidos = $("#nombresApellidos").val().trim();

    let datos = {
        op: 'buscarDetallePlanilla',
        numeroDoc: numeroDoc,
        nombresApellidos: nombresApellidos
    };

    $.ajax({
        url: 'controllers/planilla.controller.php',
        type: 'GET',
        data: datos,
        success: function (e) {
            $("#tabla-detallePlanillas").DataTable().destroy();
            $("#datos-detallePlanillas").html(e);

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

$("#numeroDocConsulta").keyup(function(){
    var table = $("#tabla-consultasGeneral").DataTable();
    table.column($(this).data('index')).search(this.value).draw();
});

$("#anioConsulta").keyup(function(){
    var table = $("#tabla-consultasGeneral").DataTable();
    table.column($(this).data('index')).search(this.value).draw();
});

$("#mesConsulta").keyup(function(){
    var table = $("#tabla-consultasGeneral").DataTable();
    table.column($(this).data('index')).search(this.value).draw();
});


/* BUSQUEDA DE USUARIOS EXTERNAS */

// Evento keyup para buscar por año
$("#anioConsultasUnicas").on("keyup", function () {
    listarBoletasUsuarios();
});

// Evento change para el mes, en caso de que se seleccione un mes
$("#mesConsultasUnicas").on("change", function () {
    listarBoletasUsuarios();
});


// Ejecutar búsqueda cuando se hace clic en el botón
$("#btnBuscarPlanilla").on("click", function () {
    buscarDetallePlanilla();
});


$("#tabla-detallePlanillas").on("click", ".reporte", function () {
    let idplanillaDetalle = $(this).attr("data-idplanillaDetalle");
    console.log("click en el reporte", idplanillaDetalle);
    window.open("reports/reporte.php?idplanillaDetalle=" + idplanillaDetalle);
});

$("#tabla-consulta").on("click", ".reporte", function () {
    let idplanillaDetalle = $(this).attr("data-idplanillaDetalle");
    console.log("click en el reporte", idplanillaDetalle);
    window.open("reports/reporte.php?idplanillaDetalle=" + idplanillaDetalle);
});

$("#tabla-consultasGeneral").on("click", ".reporte", function () {
    let idplanillaDetalle = $(this).attr("data-idplanillaDetalle");
    console.log("click en el reporte", idplanillaDetalle);
    window.open("reports/reporte.php?idplanillaDetalle=" + idplanillaDetalle);
});

listarPlanillas();
listarConsultasGeneral();
listarDetPlanillasDni(numeroDocPlanilla);