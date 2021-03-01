<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-modelo{{ $modelo->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-modelo{{ $modelo->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Modelo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('modelo.update',['id'=>$modelo->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Modelo</label>
                    <input type="text" class="form-control" name="nombre" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>