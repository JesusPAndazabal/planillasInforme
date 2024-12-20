function listarEntidades(){
    var tabla = $("#tabla-entidades").DataTable();
    tabla.destroy();    

    tabla = $("#tabla-entidades").DataTable({
        "processing"    : true,
        "order"         : [[0, "desc"]],
        "serverSide"    : true,
        "sAjaxSource"   : 'controllers/entidad.controller.php?op=listarEntidades',
        "lengthChange"  : true,
        "pageLength"    : 8,
        "language"      : { url : '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'},
        "dom"           : domTableComplete,
        "buttons"       : buttonsTableMaster,
        
    });
}

listarEntidades();
