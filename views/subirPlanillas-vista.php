<div class="container mt-4">
  <!-- Título -->
  <div class="callout callout-warning bg-warning text-white p-3 rounded">
    <h4 class="text-center mb-0">Importar archivo de Excel <i class="fas fa-user-tie ml-2"></i></h4>
  </div>

  <!-- Formulario -->
  <form id="formImportarPlanilla" class="mt-4">
    <div class="form-group">
      <label class="font-weight-bold" style="font-size: 22px;">Importar archivo Excel:</label>
      <div class="custom-file">
        <input type="file" id="archivoExcel" name="archivoExcel" accept=".xlsx, .xls, .xlsm" class="custom-file-input">
        <label class="custom-file-label" for="archivoExcel" id="archivoLabel">Seleccionar archivo...</label>
      </div>
    </div>

    <div class="text-center mt-3">
      <button type="button" class="btn btn-success btn-lg btn-block" onclick="importarPlanilla()">
        <i class="fas fa-file-import mr-2"></i>Importar Planilla
      </button>
    </div>
  </form>

  <!-- Contenedor para la animación -->
  <div id="uploadAnimation" class="mt-4 text-center" style="display: none;">
    <i class="fas fa-arrow-up text-primary animated-bounce" style="font-size: 3rem;"></i>
    <p class="mt-2">Subiendo archivo, por favor espere...</p>
  </div>
</div>

<!-- Configuración de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script>

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>

<!-- Lógica personalizada -->
<script src="dist/js/other/planillaArchivo.js"></script>

<!-- Estilo CSS para la animación -->
<style>
  .animated-bounce {
    animation: bounce 1.2s infinite;
  }

  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-10px);
    }
    60% {
      transform: translateY(-5px);
    }
  }
</style>
