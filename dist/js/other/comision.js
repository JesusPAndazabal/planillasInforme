
function listarComisiones(){
    var tabla = $("#tabla-comisiones").DataTable();
    tabla.destroy();    

    tabla = $("#tabla-comisiones").DataTable({
        "processing"    : true,
        "order"         : [[0, "desc"]],
        "serverSide"    : true,
        "sAjaxSource"   : 'controllers/comision.controller.php?op=listarComisiones',
        "lengthChange"  : true,
        "pageLength"    : 8,
        "language"      : { url : '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'},
        "dom"           : domTableComplete,
        "buttons"       : buttonsTableMaster
    });
} 

listarComisiones();