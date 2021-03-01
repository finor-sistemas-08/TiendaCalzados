<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-cliente{{ $cliente->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-cliente{{ $cliente->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cliente.update',['id'=>$cliente->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Cliente</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $cliente->nombre}}" >
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="{{ $cliente->apellidos}}" >
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="{{ $cliente->telefono}}" >
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" name="correo" value="{{ $cliente->correo}}" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>