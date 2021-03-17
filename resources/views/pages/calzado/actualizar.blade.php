<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-producto{{ $calzado->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-producto{{ $calzado->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Calzado</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="card-body">

            <form action="{{ route('calzado.update',['id'=>$calzado->id]) }}" method="post">
                @csrf





                    <div class="form-group col-12">
                        <label>Categoria</label>
                        <select class="form-control select2" name="idCategoria" style="width: 100%;">
                            @foreach (@categorias() as $cat)
                                <option value="{{$cat->id}}">{{$cat->nombre}} - {{ $cat->subCategoria}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12">
                        <label>Tipo</label>
                        <select class="form-control select2" name="idTipoCalzado" style="width: 100%;">
                            @foreach (@tipos() as $tip)
                                <option value="{{$tip->id}}">{{$tip->tipo}}</option>
                            @endforeach                  
                        </select>
                    </div>
                    
                    <div class="form-group col-12">
                        <label>Marca Modelo</label>
                        <select class="form-control select2" name="idMarcaModelo" style="width: 100%;">
                            @foreach ($marcasModelos as $marMod)
                                <option value="{{$marMod->id}}">{{@nombreMarca($marMod->id)}} - {{ @nombreModelo($marMod->id) }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 col-md-12">
                        <div class="form-group">
                            <label>Precio Venta</label>
                            <input name="precioVenta" type="float" value="{{$calzado->precioVenta}}" class="form-control form-control-sm" id="precioVenta">
                        </div>
                    </div>  

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Precio Compra</label>
                            <input name="precioCompra" type="float" value="{{$calzado->precioCompra}}" class="form-control form-control-sm" id="precioVenta">                        
                        </div>
                    </div>

                    <div class="md-form form-group col-12">
                        <label for="form10">Descripcion</label>
                        <i class="fas fa-pencil-alt prefix"></i>
                        <textarea id="form10" name="descripcion" value="{{$calzado->descripcion}}" class="md-textarea form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Seleccione Imagen</label>
                            <input type="file"  name="imagen" class="form-control form-control-sm">
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