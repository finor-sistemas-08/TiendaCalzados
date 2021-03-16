<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-proveedor{{ $proveedor->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-proveedor{{ $proveedor->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Proveedor</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('proveedor.update',['id'=>$proveedor->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Proveedor</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $proveedor->nombre}}" >
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="{{ $proveedor->apellidos}}" >
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" name="correo" value="{{ $proveedor->correo}}" >
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="{{ $proveedor->telefono}}" >
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="{{ $proveedor->direccion}}" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>