<div class="modal fade" id="mdlData" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Cliente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <!-- card-header content -->
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formData">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtid" name="id"
                                    placeholder="Id Autogenerado" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtnombre" name="nombre"
                                    placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtapellido" name="apellido"
                                    placeholder="Apellido">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtcelular" name="celular"
                                    placeholder="Celular">
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txttipodocumento" name="tipodocumento"
                                    placeholder="Tipo Documento">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="txtnumdocumento" name="numerodocumento"
                                    placeholder="Número Documento">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtdireccion" name="direccion"
                                    placeholder="Dirección">
                            </div> 
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtcorreo" name="correo"
                                    placeholder="Correo">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- card footer  content -->
                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">
             <i class="fas fa-times"></i> Cerrar</button>
            <button id="btnGuardar" type="button" class="btn btn-success">
              <i class="fas fa-save"></i> Guardar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>