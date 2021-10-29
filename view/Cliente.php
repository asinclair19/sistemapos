<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Clientes para ventas</h3><br>
            <a class="btn-success btn btn-sm" id="btnNuevo">
                <i class="fas fa-plus"></i> Nuev@</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="dataTables_wrapper dt-bootstrap4">
                <table id="infoTable" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--content -->
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>
<?php 
    include './view/modals/mdl-client.php'; 
?>
<script src= './src/js/clients.js'></script>