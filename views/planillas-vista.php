<link href="dist/css/other/styleempleados.css" rel="stylesheet" >

<div class="callout callout-success">
  <h4 class="text-center">Módulo de Planillas<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="card border-dark" id="card-docentes">
    <div class="card-body table-responsive p-4">
        <!--  -->
        <table class="table table-valign-middle table-striped " id="tabla-planillas">
            <thead>
            <tr>
                <th>Id</th>
                <th>Año</th>
                <th>Mes</th>
            </tr>
            </thead>
            <tbody id="datos-planillas">
                <!-- Se carga de forma asincrona -->
            </tbody>
        </table>
    </div>
</div><!-- Fin del card -->



<!-- Tabla de Detalle de Planilla (Oculta al principio) -->
<div class="card border-dark" id ="detalle-planilla" style="display: none;">
    <div class="card-body table-responsive p-4">
        <h4>Buscar Detalle de la Planilla</h4>

        <div class="d-flex justify-content-center">
    <div class="row align-items-end">
        <div class="col-md-4">
            <div class="form-group">
                <label for="numeroDoc">N° Documento</label>
                <input type="text" id="numeroDoc" class="form-control" placeholder="N° documento">
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="nombresApellidos">Nombres y Apellidos</label>
                <div class="input-group">
                    <input type="text" id="nombresApellidos" class="form-control" placeholder="Nombres y Apellidos">
                    <div class="input-group-append">
                        <button id="btnBuscarPlanilla" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        
        <table class="table table-valign-middle table-striped text-center" id="tabla-detallePlanillas">
            <thead>
                <tr>
                    <th>N° Orden</th>
                    <th>Año</th>
                    <th>Mes</th>
                    <th>Cussp</th>
                    <th>Numero de Cuenta</th>
                    <th>Apellidos y Nombres</th>
                    <th>Numero de Documento</th>
                    <th>Cargo</th>
                    <th>Boleta</th>
                    <!-- Otros campos si es necesario -->
                </tr>
            </thead>
            <tbody id = "datos-detallePlanillas">
                <!-- Aquí se cargarán los detalles con JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Configuracion de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script> 

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>

<script src="dist/js/other/planilla.js"></script>


