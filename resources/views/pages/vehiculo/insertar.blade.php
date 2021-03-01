<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#create-vehiculo">Agregar vehiculo</button>
<div id="create-vehiculo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-info">
                <h5 class="modal-title" id="my-modal-title">Agregar vehiculo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vehiculo.store') }}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" name="tipo" >
                </div>
                <div class="form-group">
                    <label for="placa">Placa</label>
                    <input type="text" class="form-control" name="placa" >
                </div>
                <div class="col-md-13">
                    <div class="form-group">
                        <label>Repartidor</label>
                        <select class="form-control select2" name="idRepartidor" style="width: 100%;">
                            @foreach (@repartidores() as $rep)
                                <option value="{{$rep->id}}">{{$rep->nombre}} {{$rep->apellidos}}</option>
                            @endforeach                  
                        </select>
                    </div>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>