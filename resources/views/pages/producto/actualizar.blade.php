<a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update-producto{{ $producto->id }}">
    <i class="fas fa-edit"></i>
</a>
<div id="update-producto{{ $producto->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-default-success">
                <h5 class="modal-title" id="my-modal-title">Modificar Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('producto.update',['id'=>$producto->id]) }}" method="post">
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
                        <input name="precioVenta" type="float" value="{{$producto->precioVenta}}" class="form-control" id="precioVenta">
                    </div>
                </div>  

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Precio Compra</label>
                        <input name="precioCompra" type="float" value="{{$producto->precioCompra}}" class="form-control" id="precioVenta">                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>