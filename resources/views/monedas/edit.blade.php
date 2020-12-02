@extends('adminlte::page')
@section('title','Editar monedas')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')

<form action="{{ route('monedas.update',$moneda->id) }}" method="POST">

  @csrf

  @method('PUT')

  <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <h1>Editar moneda</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <form>
                  <div class="form">
                    <div class="form-field">
                          <input name='nombre'  type="text" class="input-text"  value="{{$moneda->nombre}}" required>
                          <span>Nombre corto</span>   
                    </div>
                    <div class="form-field">
                      @php
                          $array  = ["₡","$","€"];
                      @endphp
                      <select name="simbolo" id="simbolo" class="input-select mt-4" required>
                            @foreach($array as $item)
                                <option value="{{ $item }}" @if($moneda->simbolo=== $item) selected='selected' @endif>{{ $item }}</option>
                            @endforeach
                      </select>
                      <!-- <input name='simbolo'  type="text" class="input-text" value="{{$moneda->simbolo}}" required> -->
                      <span>Símbolo</span>
                    </div>
                    <div class="form-field">
                      <input name='descripcion'  type="text" class="input-text" value="{{$moneda->descripcion}}" required>
                      <span>Descripción</span>
                    </div>
                    <div class="form-field">
                      <input name='tasa'  type="text" class="input-text" value="{{$moneda->tasa}}" required>
                      <span>Tasa</span>
                    </div>
                    
                  </div>
                </form>
                <div class="d-flex justify-content-center mt-5">
                  <div class="mr-1">
                    <button type="submit" class="btn btn-success btn-crud" >Editar <i class="fa fa-edit"></i></button>
                  </div>
                  <div class="ml-1">
                    <a href="{{ route('monedas.index') }}" class="btn btn-danger btn-crud" >Cancelar <i class="fa fa-ban"> </i></a>
                  </div>

                </div>
                </div>
            </div>
        </div>
      </div>
    </div>


    
  </div>

</form>
@endsection