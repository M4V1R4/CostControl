@extends('adminlte::page')
@section('title','Editar transacciones')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')

  <form action="{{ route('transaccions.update',$transacc->id) }}" method="POST">

    @csrf

    @method('PUT')
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <h1>Editar transacciones</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <form>
                  <div class="form">
                    <div class="row">
                      <div class="form-field col-md-6">
                        @php
                          $array  = ["Ingreso","Gasto"];
                        @endphp
                        <select name="tipo" id="tipo" class="input-select mt-4" required>
                          @foreach($array as $item)
                              <option value="{{ $item }}" @if($transacc->tipo=== $item) selected='selected' @endif>{{ $item }}</option>
                          @endforeach
                        </select>
                        <span>Tipo</span>
                      </div>
                      <div class="col-md-6 form-field">
                          <input name='fecha' type="date" class="input-text" required value="{{$transacc->fecha}}" min="2010-01-01">    
                          <span>Fecha</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-field col-md-6">
                        <select  id="cuenta" name="cuenta" class="input-select mt-4" required> 
                            @foreach( $cuentas as $key )
                                <option value="{{ $key->nombre }}"@if($transacc->cuenta === $key->nombre) selected='selected' @endif>{{ $key->nombre}}</option> 
                            @endforeach
                        </select>
                        <span>Cuenta</span>
                      </div>
                      <div class="form-field col-md-6">
                        <select name="categoria" id="categoria" class="input-select mt-4" required>
                            @foreach($sub as $key)
                              <option value="{{ $key->descripcion }}" @if($transacc->categoria === $key->descripcion) selected='selected' @endif>{{$key->descripcion}}</option>
                            @endforeach
                        </select>
                        <span>Categoría</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-field col-md-6">
                        <input name='detalle'  type="text" class="input-text" required value="{{$transacc->detalle}}">
                        <span>Detalle</span>
                      </div>
                      <div class="form-field col-md-6">
                        <input name='monto'  type="text" class="input-text" required value="{{$transacc->monto}}">
                        <span>Monto</span>
                      </div>
                    </div>
                    
                  </div>
                  <!-- ****** -->
                    
                                  
                                <!-- <input id="valorDeSelect4" type="text" name="subcategoria" value="">
                                </div>
                                  <input id="valorDeSelect" type="text" name="categoria" value="{{$transacc->categoria}}"> -->

                                 
                  </form>
                  <div class="d-flex justify-content-center mt-5">
                    <div class="mr-1">
                      <button type="submit" class="btn btn-success btn-crud" >Editar <i class="fa fa-edit"></i></button>
                    </div>
                    <div class="ml-1">
                      <a href="{{ route('transaccions.index') }}" class="btn btn-danger btn-crud" >Cancelar <i class="fa fa-ban"> </i></a>
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

 
    var valorEnvio2 = ""

    function selecOp2(valor){
    document.getElementById("valorDeSelect2").value = valor
    }
    var valorEnvio3 = ""

    function selecOp3(valor){
    document.getElementById("valorDeSelect3").value = valor
    }
    var valorEnvio4 = ""
    function selecOp4(valor){
    document.getElementById("valorDeSelect4").value = valor
    }
    function showDiv(select){
        if(select.value==1){
        document.getElementById('hidden_div').style.display = "block";
        } else{
        document.getElementById('hidden_div').style.display = "none";
        }
    } 


</script>
@endsection