/* VARIABLES GLOBALES */
var idusuario = localStorage.getItem("usuarioBoleta");
var cadena1 = "";
var cadena2 = "";
var nombrePersona = "";
var claveGenerada;
let fecha = new Date();
let añoActual = fecha.getFullYear();

var datosControlador = {
    op : 'listarUsuarios',
    search : '',
    nivelacceso : ''
};

/* FUNCIONES */

//funcion para el inicio de sesion
function iniciarSesion(){
    if($("#nombreusuario").val() != "" && $("#claveacceso").val() != ""){
        console.log($("#nombreusuario").val());
        $.ajax({
            url: 'controllers/usuario.controller.php',
            type: 'GET',
            data: {
                op 			: 'login',
                nomuser 	: $("#nombreusuario").val(),
                claveacceso  : $("#claveacceso").val()
            },
            success: function (result){
                if($.trim(result) == ""){   
                    window.location.href = 'main.php';
                }else{
                    alertError(result);
                }
            }
        });
    }
}

//Funcion para listar el card de los usuarios - vista de Admin
function listarUsuarios(){

    $.ajax({
        url:'controllers/usuario.controller.php',
        type:'GET',
        data: datosControlador,
        success: function(e){
            

            $("#tabla-usuarios").DataTable().destroy();

            // Agregar datos en cuerpo de la tabla usuario
            $("#datos-usuarios").html(e);

            // Volver a generar el dataTable
            $("#tabla-usuarios").DataTable({
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
        }
    });
}

//Funcion para registrar los Usuarios en el modal
function registrarUsuario(){
    
    var formData = new FormData();

    let nomuser         = $("#nomuser").val();
    let correo          = $("#correo").val();
    let telefono        = $("#telefono").val();
    let nivelacceso     = $("#nivelacceso").val();



    if(nomuser == '' || nivelacceso == '' || correo == ""){
        alertWarning('Complete los datos solicitados');
    }else{  
            sweetAlertConfirmQuestionSave("¿Está seguro de registrar este usuario?").then((confirm) => {
                if(confirm.isConfirmed){
                    formData.append("op", "registrarUsuario");
                    formData.append("nomuser", nomuser);
                    formData.append("correo", correo);
                    formData.append("telefono", telefono);
                    formData.append("nivelacceso", nivelacceso);

                    $.ajax({
                        url: 'controllers/usuario.controller.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(e){
                            console.log(e);
                            alertSuccess('Usuario registrado');
                            $("#modal-cargaCorreo").modal('show');
                            enviarCorreo();
                            $("#correo").val('');
                            $("#telefono").val('');

                            $("#staticBackdrop").modal('hide');
                            listarUsuarios();
                        }
                    });
                }
            });
        
    }

}

//Funcion para registrar los Usuarios en el modal
function registrarPersona(){
    var formData = new FormData();

    let tipoDoc             = $("#tipoDoc").val();
    let numeroDoc           = $("#numDocumento").val();
    let nombres             = $("#Nombres").val();
    let apellidosMat        = $("#apellidoMate").val();
    let apellidosPat        = $("#apellidoPate").val();
    let provincia           = $("#provincia").val();
    let region              = $("#region").val();
    let distrito            = $("#distrito").val();
    let direccion           = $("#direccion").val();
    let telefono            = $("#telefono").val();
    let correo              = $("#correo").val();
    let ruc                 = $("#ruc").val();
    let numCuenta           = $("#numCuenta").val();
    let regiPensionario     = $("#regPensionario").val();
    let fechaFiliacionAfp   = $("#fechaAfili").val();
    let cussp               = $("#cussp").val();
    let tipoComision        = $("#tipoComision").val();


    if(tipoDoc == '' || numeroDoc == '' || nombres == '' || apellidosMat == ""){
        alertWarning('Complete los datos solicitados 1');
    }else{  
            sweetAlertConfirmQuestionSave("¿Está seguro de registrar este usuario?").then((confirm) => {
                if(confirm.isConfirmed){
                    formData.append("op", "registrarPersona");
                    formData.append("tipoDoc", tipoDoc);
                    formData.append("numeroDoc", numeroDoc);
                    formData.append("nombres", nombres);
                    formData.append("apellidosMat", apellidosMat);
                    formData.append("apellidosPat" , apellidosPat);
                    formData.append("provincia", provincia);
                    formData.append("region", region);
                    formData.append("distrito", distrito);
                    formData.append("direccion", direccion);
                    formData.append("telefono", telefono);
                    formData.append("correo", correo);
                    formData.append("ruc", ruc);
                    formData.append("numCuenta", numCuenta);
                    formData.append("regiPensionario", regiPensionario);
                    formData.append("fechaFiliacionAfp", fechaFiliacionAfp);
                    formData.append("cussp", cussp);
                    formData.append("tipoComision", tipoComision);

                    $.ajax({
                        url: 'controllers/usuario.controller.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(e){
                            alertSuccess('Persona registrada');
                            /* $("#modal-cargaCorreo").modal('show');
                            enviarCorreo();
                            $("#apellidosuser").val('');
                            $("#nombresuser").val('');
                            $("#numerodni").val('');
                            $("#correo").val('');
                            $("#telefono").val('');

                            $("#staticBackdrop").modal('hide');
                            listarUsuarios(); */
                        }
                    });
                }
            });
        
    }

}

//Funcion para en envio del correo
function enviarCorreo(){
    let correo          = $("#correo").val();
    let numerodni       = $("#nomuser").val();

    var datos = {
        'op'        : 'enviarCorreo',
        'email'     : correo,
        'numerodni' : numerodni,
        'usuario'   : nombrePersona
    };

    $.ajax({
        url: 'controllers/correo.controller.php',
        type: 'GET',
        data: datos,
        success : function(e){
            alertSuccess('Credenciales enviadas al correo correctamente');
            $("#modal-cargaCorreo").modal('hide');
        }
    });
    
    
}

//Funcion para validar el correo
function validarCorreo(){
    let correo  = $("#correo").val();

    var datos = {
        'op' : 'validarCorreo',
        'correo' : correo 
    };

    $.ajax({
        url: 'controllers/usuario.controller.php',
        type: 'GET',
        data: datos,
        success: function(e){
            if(e == 1){
                alertError("Este correo ya existe");
            }else if(e == 2){
                registrarUsuario();
            }else{
                alertError("Ocurrio un error inesperado");
            }
        }
    });
}

//Funcion para validar el dni
function validarDni(){
    let numerodni  = $("#numerodni").val();

    var datos = {
        'op' : 'validarDni',
        'numerodni' : numerodni
    }

    $.ajax({
        url: 'controllers/usuario.controller.php',
        type: 'GET',
        data: datos,
        success: function(e){
            if(e == 1){
                alertError("Este numero de DNI ya existe");
            }else if(e == 2){
                validarCorreo();
                registrarUsuario();
            }else{
                alertError("Ocurrio un error inesperado");
            }
        }
    });

} 

//Funcion para actualizar al Usuario
function actualizarUsuario(){
    var nomuser         =     $("#nombresusuario").val();
    var correo          =     $("#correoperfil").val();
    var nivelacceso     =     $("#nivelaccesoperfil").val();
    var telefono        =     $("#telefonoperfil").val();

    var datos = {
        op : 'actualizarUsuario',
        nomuser : nomuser,
        correo : correo,
        nivelacceso : nivelacceso,
        telefono : telefono
    }

    if(nomuser == ''){
        alertWarning('Complete los datos solicitados');
    }else{  
            sweetAlertConfirmQuestionSave("¿Está seguro actualizar los datos?").then((confirm) => {
                if(confirm.isConfirmed){
                    $.ajax({
                        url: 'controllers/usuario.controller.php',
                        type: 'POST',
                        data : datos,
                        success: function(e){
                           if(e == ""){
                                obtenerUsuarios();
                                bloquearCajas();
                                alertSuccess("Datos actualizados correctamente");
                                $("#guardarPerfil").hide();
                            }
                        }
                    });
                }
            });
        
    }


}

//Funcion para bloquear las cajas de texto
function bloquearCajas(){
    $("#apellidos").prop('disabled', true);
    $("#nombres").prop('disabled', true);
    $("#nombresusuario").prop('disabled', true);
    $("#correoperfil").prop('disabled', true);
    $("#nivelaccesoperfil").prop('disabled', true);
    $("#telefonoperfil").prop('disabled', true);
    $("#numerodniperfil").prop('disabled', true);
    $("#alertanivel").removeClass('show').addClass('hide');
}

//Funcion para desbloqear las cajas
function desbloquearCajas(){
    $("#nombresusuario").prop('disabled', false);
    $("#correoperfil").prop('disabled', false);
    $("#telefonoperfil").prop('disabled', false);
}

//Funcion para el boton Cancelar del cambio de contraseña
function cancelarClave(){
    $("#formularioClave")[0].reset();
    $("#collapseOne").removeClass('show').addClass('hide');
}

//Funcion para actualizar la contraseña
function actualizarClave(){
    var claveaccesoAntigua =  $("#claveaccesoAntigua").val();
    var claveaccesoNueva1 = $("#claveaccesoNueva1").val();
    var claveaccesoNueva2 = $("#claveaccesoNueva2").val();

    if(claveaccesoAntigua == "" || claveaccesoNueva1 == "" || claveaccesoNueva2 == ""){
        alertWarning("Debe completar todos los campos");
    }else{
        if(claveaccesoNueva1 != claveaccesoNueva2){
            alertError("Las nuevas contraseñas no coinciden");
        }else{
            $.ajax({
                url: 'controllers/usuario.controller.php',
                type: 'GET',
                data: {
                    op : 'actualizarClave',
                    claveaccesoAntigua : claveaccesoAntigua,
                    claveaccesoNueva : claveaccesoNueva1
                },
                success: function(result){
                    console.log(result, "RESULT" , claveaccesoAntigua, claveaccesoNueva1);
                    if($.trim(result) == ""){
                        alertSuccess("Las contraseñas fueron actualizadas");
                        cancelarClave();
                    }else{
                        alertError(result);
                    }
                }
            });
        }
    }
}

//Funcion para el perfil de Usuario : Obtener sus datos
function obtenerUsuarios(){
    console.log(idusuario , "idusuarios");
    console.log("datos");
    $.ajax({
        url: 'controllers/usuario.controller.php',
        type: 'GET',
        dataType: 'JSON',
        data: 'op=obtenerUsuario&idusuario=' + idusuario,
        success: function(datos){
            console.log(datos);
            $("#nombresusuario").val(datos[0].nomuser);
            $("#correoperfil").val(datos[0].correo);

            if(datos[0].nivelacceso == "C"){
                $("#nivelaccesoperfil").val('Consultas');
            }else if(datos[0].nivelacceso == "A"){
                $("#nivelaccesoperfil").val('Administrador');
            }

            $("#telefonoperfil").val(datos[0].telefono);
        
            bloquearCajas();
            $("#guardarPerfil").hide();
        }
    }); 
}

//bUSCAR PERSONA
function buscarPersona(){

    var codigodni = $("#dniEmpleadoBuscar").val();
    console.log("dni" , codigodni);

    $.ajax({
        url: 'controllers/persona.controller.php',
        type: 'GET',
        dataType: 'JSON',
        data: { op: 'buscarPersona', numeroDoc: codigodni }, 
        success: function (datos) {
            $("#modalbuscarEmpleado").modal('hide');
            console.log(datos);
            $("#nomuser").val(datos[0].numeroDoc);
            nombrePersona = datos[0].nombresApellidos;

        },
        error: function (xhr, status, error) {
            alertError("El numero de documento es incorrecto");
        }
    }); 
}

//funcion para moestrar las contraseñas - Perfil
function mostrarClaves(){
    if(claveaccesoAntigua.type == "password" || claveaccesoNueva1 == "password" || claveaccesoNueva2 == "password"){
        claveaccesoAntigua.type = "text";
        claveaccesoNueva1.type = "text";
        claveaccesoNueva2.type = "text";
    }else{
         claveaccesoAntigua.type = "password";
         claveaccesoNueva1.type = "password";
         claveaccesoNueva2.type = "password";
    }
}

//Funcion para ocultar las contraseñas
function ocultarClaves(){
    claveaccesoAntigua.type = "password";
    claveaccesoNueva1.type = "password";
    claveaccesoNueva2.type = "password";
}

function estadoUsuario(idusuario, estado){
    $.ajax({
        url:'controllers/usuario.controller.php',
        type:'GET',
        data: {
            op : 'estadoUsuario',
            idusuario : idusuario,
            estado : estado
        },
        success: function(result){
            console.log(result);
            updateDataSendController()
            listarUsuarios();
        }
    });
}


//Boton para buscar el dni del empleado
$("#btnCargarEmpleado").click(function(){
    console.log("CLICK DEL BOTO");
    buscarPersona();
    
});

//Evento para el boton de registrar Usuario
$("#registrarUsuario").click(function(){

    registrarUsuario();
});

//Evento para la caja de texto de la contraseña
$("#claveacceso").keypress(function (event){
    if(event.keyCode == 13){
        iniciarSesion();
    }
});

//Boton para invocar el inicio de sesion
$("#acceder").click(iniciarSesion);

//Evento para el boton de editar la informacion en el perfil del Usuario
$("#editar").click(function(){
    desbloquearCajas();
    $("#guardarPerfil").show();
});

//Eveento para el boton de Guardar la modificacion en el perfil del usuario
$("#guardarPerfil").click(function(){
    actualizarUsuario();
});

//Evento para mostrar o ocultae las contraseñas
$("#customCheck1").click(function(){
    let mostrarClave = $(this).prop("checked");
    var claveaccesoAntigua =  $("#claveaccesoAntigua").val();
    var claveaccesoNueva1 = $("#claveaccesoNueva1").val();
    var claveaccesoNueva2 = $("#claveaccesoNueva2").val();

    if(mostrarClave == true){
        mostrarClaves();
    }else{
        ocultarClaves();
    }
});

//Evento para cancelar actualziacion de la contraseña
$("#cancelarClave").click(cancelarClave);

//Evento para el boton de actualizar contraseña
$("#actualizarClave").click(actualizarClave);

//Evento para el boton de registrar Usuario
$("#registrarPersona").click(function(){
    console.log("click");
    registrarPersona();
});

//Evento para buscar por en el select el tipo de usuario
$("#typeuser").change(function(){

    $("#input-search").val("").focus();

    datosControlador['nivelacceso'] = $(this).val();        
    listarUsuarios();
});

//Evento para la caja de texto del nombre del usuario
$("#input-search").keyup(function(e){
    var valueInput = $(this).val();
    
    if(valueInput == ''){
      $("#btn-search i").removeClass("fa-times").addClass('fa-search');
    }
    else{
      $("#btn-search i").removeClass("fa-search").addClass('fa-times');
    }
  
    updateDataSendController();
    listarUsuarios();
});

//Limpiar las cajas de texto
$("#btn-limpiar").click(function(){

    $("#typeuser").val('');
    $("#input-search").val('').focus();



    updateDataSendController();
    listarUsuarios();
});
  
//Evento para cambiar el nivel de acceso a Administrador
$("#tabla-usuarios").on("click", ".admin", function(){
    var idusuario = $(this).attr("data-idusuario");

    sweetAlertConfirmQuestionSave("¿Estas seguro de asignar el nuevo acceso?").then((confirm) => {
        if(confirm.isConfirmed){
            $.ajax({
                url: 'controllers/usuario.controller.php',
                type: 'GET',
                data: 'op=nivelAdmin&idusuario=' + idusuario,
                success: function(e) {
                    listarUsuarios();
                    alertSuccess("Asignado correctamente");
                }
            });
        }
    });
});

//Evento para cambiar el nivel de acceso a Usuario
$("#tabla-usuarios").on("click", ".usuario", function(){
    var idusuario = $(this).attr("data-idusuario");

    sweetAlertConfirmQuestionSave("¿Estas seguro de asignar el nuevo acceso?").then((confirm) => {
        if(confirm.isConfirmed){
            $.ajax({
                url: 'controllers/usuario.controller.php',
                type: 'GET',
                data: 'op=nivelUsuario&idusuario=' + idusuario,
                success: function(e) {
                    listarUsuarios();
                    alertSuccess("Asignado correctamente");
                }
            });
        }
    });
});

//Evento para cambiar el nivel de acceso a Revisador
$("#tabla-usuarios").on("click", ".revisador", function(){
    var idusuario = $(this).attr("data-idusuario");

    sweetAlertConfirmQuestionSave("¿Estas seguro de asignar el nuevo acceso?").then((confirm) => {
        if(confirm.isConfirmed){
            $.ajax({
                url: 'controllers/usuario.controller.php',
                type: 'GET',
                data: 'op=nivelRevisador&idusuario=' + idusuario,
                success: function(e) {
                    listarUsuarios();
                    alertSuccess("Asignado correctamente");
                }
            });
        }
    });
});

//Evento para eliminar logicamente a un usuario
$("#tabla-usuarios").on("click", ".estado", function(){
    var idusuario = $(this).attr("data-idusuario");
    let estado = $(this).prop("checked") ? '1' : '0';

    console.log(idusuario);
    console.log(estado);
    sweetAlertConfirmQuestionSave("¿Estas seguro de cambiar el estado del usuario?").then((confirm) => {
        if(confirm.isConfirmed){
            estadoUsuario(idusuario,estado);
        }else{
            updateDataSendController();
            listarUsuarios();
        }
    });
});

//Actualizar los datos del controller
function updateDataSendController(){
    datosControlador['nivelacceso'] = $("#typeuser").val();   
    datosControlador['search'] = $("#input-search").val().trim(); 
}
  
obtenerUsuarios();
listarUsuarios();
