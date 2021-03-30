@extends('index')
@section('contenido')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Actualizar Calzado</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Calzados</li>
                    </ol>
                </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools"></div>
            </div>
            <div class="card-body"> 
                <form action="{{ route('calzado.update',['id'=>$calzado->id]) }}" method="post"  enctype="multipart/form-data">
                     @csrf           
                    <div class="md-form form-group col-12">
                        <label for="codigo">Codigo</label>
                        <input id="codigo" name="codigo" value="{{ $calzado->codigo }}" class="form-control form-control-sm" rows="3">
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
                        <label>Categoria</label>
                        <select class="form-control select2" name="idCategoria" style="width: 100%;">
                            @foreach (@categorias() as $cat)
                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                  
                    
                    <div class="form-group col-12">
                        <label>Marca Modelo</label>
                        <select class="form-control select2" name="idMarcaModelo" style="width: 100%;">
                            @foreach ($marcasModelos as $marMod)
                                <option value="{{$marMod->id}}">{{@nombreMarca($marMod->id)}} - {{ @nombreModelo($marMod->id) }} - {{ $marMod->color}} - {{ $marMod->talla}} </option>
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
                        <textarea id="form10" name="descripcion" class="md-textarea form-control" rows="3" placeholder="{{$calzado->descripcion}}"></textarea>
                    </div>

            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Seleccione Imagen</label>
                            <input type="file"  name="imagen" class="form-control form-control-sm">
                        </div>
                    </div>

                    <img src="{{ asset($calzado->imagen) }}" width="100" height="100" alt="">
                  
                    </div>                        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
