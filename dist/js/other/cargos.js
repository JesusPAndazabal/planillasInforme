function listarCargos(){
    var tabla = $("#tabla-cargos").DataTable();
    tabla.destroy();    

    tabla = $("#tabla-cargos").DataTable({
        "processing"    : true,
        "order"         : [[0, "desc"]],
        "serverSide"    : true,
        "sAjaxSource"   : 'controllers/cargo.controller.php?op=listarCargos',
        "lengthChange"  : true,
        "pageLength"    : 8,
        "language"      : { url : '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'},
        "dom"           : domTableComplete,
        "buttons"       : buttonsTableMaster,
        
    });
}

function registrarCargos(){
    var descripcionCargo    = $("#descripcionCargo").val();
    var remuneracionCargo   = $("#remuneracion").val();

    if(descripcionCargo == "" || remuneracionCargo == ""){
        alert("Complete los cargos");
    }else{
        var datos = {
            'op'                : 'registrarCargo',
            'idmeta'            : idmeta,
            'descripcion'       : descripcionCargo,
            'remuneracion'      : remuneracionCargo,
        };

        sweetAlertConfirmQuestionSave('¿Estas seguro de guardar los datos?').then((confirm) =>{
            if(confirm.isConfirmed){
                $.ajax({
                    url:'controllers/cargo.controller.php',
                    type: 'GET',
                    data: datos,
                    success: function(e){
                        listarCargos();
                        alertSuccess("Cargo registrada correctamente");
                        $("#modal-cargo").modal('hide');
                    }
                });
            }
        });
    }
}

//Evento para el autocompletado de los empleados
$("#numMeta").autoComplete({
    resolver: 'custom',
    minLenght: 3,
    noResultsText : "No encontrado",
    events: {
        search: function(query, callback){
            $.ajax({
                url:'controllers/cargo.controller.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'op' : 'busquedaMeta',
                    'search' : query
                }
            }).done(function(res){
                callback(res);
            });
        }
    }
});

//Evento para seleccionar el id de el empleado
$("#numMeta").on("autocomplete.select", function(event, item){
    idmeta = item['idmeta'];
    console.log(idmeta);
    console.log("nota");
});

$("#btn-registrar-cargo").click(registrarCargos);

listarCargos();

