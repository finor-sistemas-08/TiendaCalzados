@extends('index')
@section('contenido')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Inventario</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Inventario</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    {{-- @include('pages.productoAlmacen.buscar') --}}
                </div>
            </div>
            <div class="card-body">          
                <div class="row">  
                    <div class="form-group col-6">
                        <label> Seleccionar Almacen</label>
                        <select class="form-control select2" name="idAlmacen" style="width: 100%;">
                            @foreach (@almacenes() as $alm)
                                <option value="{{$alm->id}}">{{$alm->sigla}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label> Seleccionar Producto</label>
                        <select class="form-control select2" name="idProducto" style="width: 100%;">
                            @foreach (@productos() as $pro)
                                <option value="{{$pro->id}}">{{$pro->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  
            </div>
        </div>     
    </div>
  </section>
    
@endsection