<div class="callout callout-success">
  <h4 class="text-center">Módulo de Consultas de Boletas<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="">Numero de Documento :</label>
        <input type="text" class="form-control" id="numeroDocConsulta" data-index="2">
    </div>
    <div class="col-md-4">
        <label for="">Año :</label>
        <input type="number" class="form-control" id="anioConsulta" data-index="3">
    </div>
    <div class="col-md-4">
        <label for="">Mes :</label>
        <select class="custom-select custom-select" id="mesConsulta" data-index="4">
            <option value="" selected>Seleccionar Mes</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Setiembre">Setiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>
    </div>
</div>
<hr>

<table class="table table-valign-middle table-striped text-center" id="tabla-consultasGeneral">
            <thead>
                <tr>
                    <th>N° Orden</th>
                    <th>Apellidos y Nombres</th>
                    <th>Numero de Documento</th>
                    <th>Año</th>
                    <th>Mes</th>
                    <th>Cargo</th>
                    <th>Reporte</th>
                    <!-- Otros campos si es necesario -->
                </tr>
            </thead>
            <tbody id = "datos-consultasGeneral">
                <!-- Aquí se cargarán los detalles con JavaScript -->
            </tbody>
        </table>

<!-- Configuracion de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script> 

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>

<script src="dist/js/other/planilla.js"></script>