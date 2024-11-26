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
        <h4>Detalle de la Planilla</h4>
        <label for="">Numero de Documento </label>
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


