<div class="callout callout-success">
  <h4 class="text-center">Módulo de Consultas de Boletas<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="row">
    <div class="col-md-6">
        <label for="">Anio</label>
        <input type="text" class="form-control" id="anioConsultasUnicas" data-index="3">
    </div>
    <div class="col-md-6">
        <label for="">Mes</label>
        <select class="custom-select custom-select" id="mesConsultasUnicas" data-index="4">
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

<br>

<table class="table table-valign-middle table-striped text-center" id="tabla-consulta">
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
            <tbody id = "datos-consulta">
                <!-- Aquí se cargarán los detalles con JavaScript -->
                 <!-- Aquí se cargarán los detalles con JavaScript -->
                <div id="spinner" style="display: none; text-align: center; margin: 20px;">
                    <i class="fas fa-spinner fa-spin" style="font-size: 24px;"></i> Cargando datos, por favor espere...
                </div>
            </tbody>
        </table>

<!-- Configuracion de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script> 

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>

<script src="dist/js/other/planilla.js"></script>