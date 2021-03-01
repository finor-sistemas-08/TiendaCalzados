<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-modelo{{ $categoria->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-modelo{{ $categoria->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Categoria</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categoria.update',['id'=>$categoria->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Categoria</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre}}" >
                </div>
                <div class="form-group">
                    <label for="subCategoria">Sub Categoria</label>
                    <input type="text" class="form-control" name="subCategoria" value="{{ $categoria->subCategoria}}" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>