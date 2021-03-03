<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-marcsModelo{{ $marcaModelo->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-marcsModelo{{ $marcaModelo->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Marca Modelo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('marcaModelo.update',['id'=>$marcaModelo->id]) }}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="form-group col-11">
                        <label for="talla">Talla</label>
                        <input type="text" value="{{$marcaModelo->talla}}" class="form-control" name="talla" >
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group col-11">
                        <label for="color" >Color</label>
                        <input type="text" value="{{$marcaModelo->color}}" class="form-control" name="color" >
                    </div>
                </div>

                <div class="form-group col-11">
                    <label>Marca</label>
                    <select class="form-control select2" name="idMarca" style="width: 100%;">
                        @foreach (@marcas() as $marc)
                            <option value="{{$marc->id}}">{{$marc->nombre}}</option>
                        @endforeach                  
                    </select>
                </div>
                
                <div class="form-group col-11">
                    <label>Modelo</label>
                    <select class="form-control form-control-lg select2" name="idModelo" style="width: 100%;">
                        @foreach (@modelos() as $mode)
                            <option value="{{$mode->id}}">{{$mode->nombre}}</option>
                        @endforeach                  
                    </select>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>