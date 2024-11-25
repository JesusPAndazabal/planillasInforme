<div class="callout callout-warning">
  <h4 class="text-center">Subir archivo de Planilla<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<form id="formImportarPlanilla">
    <label for="archivoExcel">Subir archivo Excel:</label>
    <input type="file" id="archivoExcel" name="archivoExcel" accept=".xlsx, .xls, .xlsm">
    <button type="button" onclick="importarPlanilla()">Importar Planilla</button>
</form>

<!-- Configuracion de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script> 

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>


<script src="dist/js/other/planillaArchivo.js"></script>