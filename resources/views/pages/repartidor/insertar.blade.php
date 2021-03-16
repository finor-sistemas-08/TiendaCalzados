<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#create-cliente">Agregar Repartidor</button>
<div id="create-cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Repartidor</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('repartidor.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Repartidor</label>
                    <input type="text" class="form-control" name="nombre" >
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" >
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" name="correo" >
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" >
                </div>
                <div class="form-group">
                    <label for="numeroLicencia">Numero de Licencia</label>
                    <input type="text" class="form-control" name="numeroLicencia" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>