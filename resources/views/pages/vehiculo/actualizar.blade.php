<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-vehiculo{{ $vehiculo->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-vehiculo{{ $vehiculo->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar vehiculo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vehiculo.update',['id'=>$vehiculo->id]) }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="tipo">vehiculo</label>
                    <input type="text" class="form-control" name="tipo" >
                </div>
                <div class="form-group">
                    <label for="placa">Placa</label>
                    <input type="text" class="form-control" name="placa" >
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tipo</label>
                        <select class="form-control select2" style="width: 100%;">
                            @foreach (@repartidores() as $rep)
                                <option value="{{$rep->id}}">{{$rep->nombre}}</option>
                            @endforeach                  
                        </select>
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