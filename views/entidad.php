<link href="dist/css/other/styleempleados.css" rel="stylesheet" >

<div class="callout callout-success">
  <h4 class="text-center">Módulo de Entidades<i class="fas fa-user-tie ml-2"></i></h4>
</div>

<div class="card border-dark" id="card-docentes">
    <div class="card-body table-responsive p-4">
        <!-- Button para abrir el modal -->
        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#modal-entidad" id="abrir-modal-entidad">
        Agregar Entidad<i class="fas fa-user-tie ml-2"></i>
        </button>

        <!-- Modal para el registro de Instituciones-->
        <div class="modal fade" id="modal-entidad" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="staticBackdropLabel">Registro de Entidades</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form autocomplete="off" id="formulario-empleado">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Descripcion :</label>
                                    <input type="text" class="form-control" id="descripcion">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Direccion</label>
                                    <input type="text" class="form-control" id="direccion">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Ruc</label>
                                    <input type="text" class="form-control" id="ruc" maxlength = "11">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Numero Ejecutora</label>
                                    <input type="text" class="form-control" id="numEjecutora">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Region</label>
                                    <input type="text" class="form-control" id="region">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Provincia</label>
                                    <input type="text" class="form-control" id="provincia">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="btn-registrar-entidad">Registrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <table class="table table-valign-middle table-striped " id="tabla-entidad">
            <thead>
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Direccion</th>
                <th>Ruc</th>
                <th>Numero Ejecutora</th>
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


