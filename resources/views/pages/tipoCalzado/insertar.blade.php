<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#create-tipoCalzado">Agregar tipo</button>
<div id="create-tipoCalzado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar tipoCalzado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tipoCalzado.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" name="tipo" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>