<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar-{{ $cliente->id }}" >
<i class="fas fa-trash"></i>
</button>
<div id="eliminar-{{ $cliente->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-eliminar">
                <h5 class="modal-title" id="my-modal-title">Eliminar Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cliente.delete',['id'=>$cliente->id]) }}" method="post">
                @csrf
                <div class="modal-body">
                    <p>¿Desea eliminar el registro {{ $cliente->nombre }} ?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                    <button type="text" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>