@extends('index')
@section('contenido')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Registrar Producto</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Producto</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('producto.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select class="form-control select2" name="idCategoria" style="width: 100%;">
                                        @foreach (@categorias() as $cat)
                                            <option value="{{$cat->id}}">{{$cat->nombre}} - {{ $cat->subCategoria}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select class="form-control select2" name="idTipoCalzado" style="width: 100%;">
                                        @foreach (@tipos() as $tip)
                                            <option value="{{$tip->id}}">{{$tip->tipo}}</option>
                                        @endforeach                  
                                    </select>
                                </div>
                            </div>
                    
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <select class="form-control select2" name="idMarca" style="width: 100%;">
                                        @foreach (@marcas() as $mar)
                                            <option value="{{$mar->id}}">{{$mar->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Modelo</label>
                                    <select class="form-control select2" name="idModelo" style="width: 100%;">
                                        @foreach (@modelos() as $mod)
                                            <option value="{{$mod->id}}">{{$mod->nombre}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>                
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Talla</label>
                                    <input name="talla" type="text" class="form-control" id="talla" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input name="color" type="text" class="form-control" id="color" >
                                </div>
                            </div>                    
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Precio Venta</label>
                                    <input name="precioVenta" type="float" class="form-control" id="precioVenta">
                                </div>
                            </div>                   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Precio Compra</label>
                                    <input name="precioCompra" type="float" class="form-control" id="precioVenta">                        
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                                <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>             
            </form>
        </div>
    </section>
@endsection