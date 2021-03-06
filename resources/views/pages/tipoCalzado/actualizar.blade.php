<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-tipoCalzado{{ $tipoCalzado->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-tipoCalzado{{ $tipoCalzado->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar tipoCalzado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tipoCalzado.update',['id'=>$tipoCalzado->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="tipo">tipoCalzado</label>
                    <input type="text" class="form-control" name="tipo"  value="{{ $tipoCalzado->tipo }}" >
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Seleccione Imagen</label>
                        <input type="file"  name="imagen" value="" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>