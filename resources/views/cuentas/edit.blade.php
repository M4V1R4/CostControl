@extends('adminlte::page')
@section('title','Editar cuentas')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')

  <form action="{{ route('cuentas.update',$cuenta->id) }}" method="POST">

  @csrf

  @method('PUT')
  <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <h1>Editar cuentas</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <form>
                    <div class="form">
                      <div class="form-field">
                      <input name='nombre'  type="text" class="input-text"  value="{{$cuenta->nombre}}">
                        <span>Nombre corto</span>
                      </div>
                      <div class="form-field">
                        <input name='descripcion' type="text" class="input-text" value="{{$cuenta->descripcion}}">
                        <span>Descripción</span>
                      </div>
                      <div class="form-field">
                        <input name='saldoInicial'  type="text" class="input-text" value="{{$cuenta->saldoInicial}}">
                        <span>Saldo inicial</span>
                      </div>
                      <div class="form-field">
                        <select  selected="selected" name="moneda_id" id="moneda_id" onchange="selecOp(event.target.value)" class="input-select mt-4" required>
                          @foreach( $monedas as $key )
                            <option value="{{ $key->id }}" @if($cuenta->moneda_id === $key->id) selected='selected' @endif>{{$key->nombre}}</option>
                          @endforeach
                          </select>
                        <span>Moneda</span>
                      </div>
                    </div>
                  </form>
                  <div class="d-flex justify-content-center mt-5">
                    <div class="mr-1">
                      <button type="submit" class="btn btn-success btn-crud" >Editar <i class="fa fa-edit"></i></button>
                    </div>
                    <div class="ml-1">
                      <a href="{{ route('cuentas.index') }}" class="btn btn-danger btn-crud" >Cancelar <i class="fa fa-ban"> </i></a>
                    </div>
                  </div>
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
</script>
@endsection