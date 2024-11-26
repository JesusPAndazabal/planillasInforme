<link href="dist/css/other/styleempleados.css" rel="stylesheet" >

<div class="callout callout-success">
  <h4 class="text-center">Módulo de Personas<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="card border-dark" id="card-docentes">
    <div class="card-body table-responsive p-4">
        <!--  -->
        <table class="table table-valign-middle table-striped " id="tabla-personas">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tipo de Documento</th>
                <th>Numero de Documento</th>
                <th>Apellidos y Nombres</th>
            </tr>
            </thead>
            <tbody id="datos-personas">
                <!-- Se carga de forma asincrona -->
            </tbody>
        </table>
    </div>
</div><!-- Fin del card -->


<!-- Configuracion de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script> 

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>

<script src="dist/js/other/persona.js"></script>


