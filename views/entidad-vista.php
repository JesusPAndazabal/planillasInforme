<link href="dist/css/other/styleempleados.css" rel="stylesheet" >

<div class="callout callout-success">
  <h4 class="text-center">Módulo de Entidades<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="card border-dark" id="card-docentes">
    <div class="card-body table-responsive p-4">
        <!--  -->
        <table class="table table-valign-middle table-striped " id="tabla-entidades">
            <thead>
            <tr>
                <th>Id</th>
                <th>Entidad</th>
                <th>Dirección</th>
                <th>Ruc</th>
                <th>Numero de Ejecutora</th>
                <th>Region</th>
                <th>Provincia</th>
            </tr>
            </thead>
            <tbody id="datos-entidades">
                <!-- Se carga de forma asincrona -->
            </tbody>
        </table>
    </div>
</div><!-- Fin del card -->


<!-- Configuracion de alertas personalizadas -->
<script src="dist/js/configAlerts.js"></script> 

<!-- Datatable -->
<script src="dist/js/dataTableConfig.js"></script>

<script src="dist/js/other/entidad.js"></script>


