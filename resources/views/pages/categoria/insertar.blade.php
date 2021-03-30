<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#create-modelo">Agregar Categoria</button>
<div id="create-modelo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar Categoria</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categoria.store') }}" method="post"enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Categoria</label>
                    <input type="text" class="form-control" name="nombre" >
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Seleccione Imagen</label>
                    <input type="file"  name="imagen" value="" class="form-control form-control-sm">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>