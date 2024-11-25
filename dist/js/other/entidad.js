function listarEntidades(){
    var tabla = $("#tabla-entidad").DataTable();
    tabla.destroy();    

    tabla = $("#tabla-entidad").DataTable({
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

function registrarEntidad(){
    var descripcion = $("#descripcion").val();
    var direccion = $("#direccion").val();
    var ruc = $("#ruc").val();
    var numEjecutora = $("#numEjecutora").val();
    var region = $("#region").val();
    var provincia = $("#provincia").val();

    if( descripcion == "" || direccion == "" || ruc == "" || numEjecutora == ""){
        alert("Complete los datos");
    }
    else{
        var datos = {
            'op'            : 'registrarEntidad',
            'descripcion'   : descripcion,
            'direccion'     : direccion,
            'ruc'           : ruc,
            'numEjecutora'  : numEjecutora,
            'region'        : region,
            'provincia'     : provincia
        };

        sweetAlertConfirmQuestionSave('¿Estas seguro de guardar los datos?').then((confirm) =>{
            if(confirm.isConfirmed){
                $.ajax({
                    url:'controllers/entidad.controller.php',
                    type: 'GET',
                    data: datos,
                    success: function(e){
                        listarEntidades();
                        alertSuccess("Entidad registrada correctamente");
                        $("#modal-entidad").modal('hide');
                    }
                });
            }
        });
    }
}

//evento para el boton de registro de empleado
$("#btn-registrar-entidad").click(registrarEntidad);

listarEntidades();
