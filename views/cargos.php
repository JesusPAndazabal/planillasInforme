<link href="dist/css/other/styleempleados.css" rel="stylesheet" >

<div class="callout callout-success">
  <h4 class="text-center">Módulo de Cargos<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="card border-dark" id="card-docentes">
    <div class="card-body table-responsive p-4">
        <!-- Button para abrir el modal -->
        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-cargo" id="abrir-modal-cargo">
        Agregar Cargo<i class="fas fa-user-tie ml-2"></i>
        </button>

        <!-- Modal para el registro de Instituciones-->
        <div class="modal fade" id="modal-cargo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="staticBackdropLabel">Registro de Cargos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form autocomplete="off" id="formulario-cargos">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Numero de Meta</label>
                                    <input type="search" class="form-control" id="numMeta">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcionCargo">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Remuneracion</label>
                                    <input type="text" class="form-control" id="remuneracion">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="btn-registrar-cargo">Registrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <table class="table table-valign-middle table-striped " id="tabla-cargos">
            <thead>
            <tr>
                <th>Id</th>
                <th>Numero de Meta</th>
                <th>Descripcion</th>
                <th>Remuneracion</th>
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

<script src="dist/js/other/cargos.js"></script>


