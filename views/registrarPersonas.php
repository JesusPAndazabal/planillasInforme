<div class="callout callout-warning">
  <h4 class="text-center">Registro de Personas<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="card card-secondary">
    <div class="card-header">
        <h6 class="text-center text-bold">Datos de la Persona</h6> 
    </div><!-- fin del header-card -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <label for="">Tipo de Documento :</label>
                <select class="custom-select custom-select" id="tipoDoc">
                    <option value="D">Dni</option>
                    <option value="P">Pasaporte</option>
                    <option value="C">Carnet de Extranjeria</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Num. Documento :</label>
                <input type="text" class="form-control" id="numDocumento">
            </div>
            <div class="col-md-2">
                <label for="">Nombres</label>
                <input type="text" class="form-control" id="Nombres">
            </div>
            <div class="col-md-2">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoMate">
            </div>
            <div class="col-md-2">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidoPate">
            </div>
            <div class="col-md-2">
                <label for="">Provincia</label>
                <input type="text" class="form-control" id="provincia">
            </div>
        </div>
    <br>        
        <div class="row">
            <div class="col-md-2">
                <label for="">Region</label>
                <input type="text" class="form-control" id="region">
            </div>
            <div class="col-md-2">
                <label for="">Distrito</label>
                <input type="text" class="form-control" id="distrito">
            </div>
            <div class="col-md-2">
                <label for="">Direccion</label>
                <input type="text" class="form-control" id="direccion">
            </div>
            <div class="col-md-1">
                <label for="">Telefono</label>
                <input type="text" class="form-control" id="telefono">
            </div>

            <div class="col-md-3">
                <label for="">Correo Electronico</label>
                <input type="text" class="form-control" id="correo">
            </div>

            <div class="col-md-2">
                <label for="">Ruc</label>
                <input type="text" class="form-control" id="ruc">
            </div>

        </div><!-- Fin del 2 row -->

        <br>

            <div class="row">
                <div class="col-md-2">
                    <label for="">Num. de Cuenta</label>
                    <input type="text" class="form-control" id="numCuenta">
                </div>
                <div class="col-md-2">
                    <label for="">Regimen Pensionario</label>
                    <input type="text" class="form-control" id="regPensionario">
                </div>
                <div class="col-md-2">
                    <label for="">Fecha de Afiliacion Afp</label>
                    <input type="date" class="form-control" id="fechaAfili">
                </div> 
                <div class="col-md-2">
                    <label for="">Cussp</label>
                    <input type="text" class="form-control" id="cussp">
                </div>
                <div class="col-md-2">
                    <label for="">Tipo de Comision</label>
                    <select class="custom-select custom-select" id="tipoComision">
                    <option value="1">Mixta</option>
                    <option value="0">No mixta</option>
                </select>
                </div>
            </div>
    </div><!-- fin del body-card -->
    <div class="card-footer">
    <button type="button" class="btn btn-success" id="registrarPersona">Registrar Persona<i class="fas fa-registered ml-2"></i></button>
    </div><!-- fin del footer-card -->
</div><!-- fin del card -->

<!-- Configuracion de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script> 

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>


<script src="dist/js/other/adminUsuarios.js"></script>