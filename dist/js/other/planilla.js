
function listarPlanillas(){
    var tabla = $("#tabla-planillas").DataTable();
    tabla.destroy();    

    tabla = $("#tabla-planillas").DataTable({
        "processing"    : true,
        "order"         : [[0, "desc"]],
        "serverSide"    : true,
        "sAjaxSource"   : 'controllers/planilla.controller.php?op=listarPlanillas',
        "lengthChange"  : true,
        "pageLength"    : 8,
        "language"      : { url : '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'},
        "dom"           : domTableComplete,
        "buttons"       : buttonsTableMaster
    });
} 

listarPlanillas();