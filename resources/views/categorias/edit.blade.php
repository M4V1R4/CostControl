@extends('adminlte::page')
@section('title','Editar categorías')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')

  <form action="{{ route('categorias.update',$categoria->id) }}" method="POST">

  @csrf

  @method('PUT')
  <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <h1>Editar categorías</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <form>
                    <div class="form">
                      <div class="form-field">
                        <select name="catPadre" id="catPadre" onchange="selecOp(event.target.value)" class="input-select mt-4" required>
                          <option value="N/A">N/A</option>
                          @foreach($sub as $key => $value)
                            <option value="{{ $key }}" @if($categoria->catPadre === $key) selected='selected' @endif>{{$key}}</option>
                          @endforeach
                        </select>
                        <span>Categoría padre</span>
                      </div>
                      <div class="form-field">
                        @php
                            $array  = ["Ingreso","Gasto"];
                        @endphp
                        <select name="tipo" id="tipo" class="input-select mt-4" required>
                          @foreach($array as $item)
                              <option value="{{ $item }}" @if($categoria->tipo=== $item) selected='selected' @endif>{{ $item }}</option>
                          @endforeach
                        </select>
                      <!-- <input id="valorDeSelect3" type="text" name="tipo" value="{{$categoria->tipo}}"> -->
                        <span>Tipo</span>
                      </div>
                      <div class="form-field">
                        <input id="valorDeSelect2" type="text" name="descripcion" value="{{$categoria->descripcion}}" class="input-text" required>
                        <span>Descripción</span>
                      </div>
                      <div class="form-field">
                        <input name='presupuesto'  type="text" value="{{$categoria->presupuesto}}" class="input-text" required >
                        <span>Presupuesto</span>
                      </div>
                    </div>
                  </form>
                  <div class="d-flex justify-content-center mt-5">
                    <div class="mr-1">
                      <button type="submit" class="btn btn-success btn-crud" >Editar <i class="fa fa-edit"></i></button>
                    </div>
                    <div class="ml-1">
                      <a href="{{ route('categorias.index') }}" class="btn btn-danger btn-crud" >Cancelar <i class="fa fa-ban"> </i></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
  </div>
  </div>

  </form>


  <script>
    var valorEnvio = ""

    function selecOp(valor){
    document.getElementById("valorDeSelect").value = valor
    }

 
    var valorEnvio2 = ""

    function selecOp2(valor){
    document.getElementById("valorDeSelect2").value = valor
    }
    var valorEnvio3 = ""

    function selecOp3(valor){
    document.getElementById("valorDeSelect3").value = valor
    }


</script>
@endsection