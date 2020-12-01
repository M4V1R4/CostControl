@extends('adminlte::page')
@section('title','Editar transacciones')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')

  <form action="{{ route('transaccions.update',$transacc->id) }}" method="POST">

    @csrf

    @method('PUT')
    
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
              <div class="input-group">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Tipo:</label> 
                        <select  id="no_conformidad" onchange="selecOp3(event.target.value)">
                            <option value=""></option> 
                            <option>Ingreso</option>
                            <option>Gasto</option>
                            <option>Traslado</option>
                          </select>
                          <input id="valorDeSelect3" type="text" name="tipo" value="{{$transacc->tipo}}">
                      <label for="nombre" class="col-md-4 col-form-label text-md-right">Cuenta:</label>                            
                          <select  id="no_conformidad" onchange="selecOp2(event.target.value)">
                          <option value=""></option> 
                              @foreach( $cuentas as $key => $value )

                                  <option value="{{ $key }}">{{ $key}}</option> 

                              @endforeach
                          </select>
                          <input  id="valorDeSelect2" type="text" name="cuenta"value="{{$transacc->cuenta}}">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria:</label>                            
                          <select  id="no_conformidad" onchange="selecOp(event.target.value), showDiv(this)">
                          <option value=""></option> 
                          <option value="1">SubCategorias</option> 
                              @foreach( $padre as $key => $value )

                                  <option value="{{ $key }}">{{ $key}}</option>  

                              @endforeach
                          </select>

                          <div id="hidden_div" style="display:none;">

                            <select onchange="selecOp4(event.target.value)">
                                <option value=""></option> 
                                    @foreach( $sub as $key => $value )

                                        <option value="{{ $key }}">{{ $key}}</option> 

                                    @endforeach
                            </select>
                        <input id="valorDeSelect4" type="text" name="subcategoria" value="">
                        </div>
                          <input id="valorDeSelect" type="text" name="categoria" value="{{$transacc->categoria}}">
                          <label for="descripcion" class="col-md-4 col-form-label text-md-right">Detalle:</label>
                          <input name='detalle'  type="text" class="form-control" aria-label="" value="{{$transacc->detalle}}">
                          <label for="tasa" class="col-md-4 col-form-label text-md-right">Monto:</label>
                          <input name='monto'  type="text" class="form-control" value="{{$transacc->monto}}" >
            </form>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-warning" >Editar <i class="fa fa-edit"></i></button>

            <a href="{{ route('transaccions.index') }}" class="btn btn-danger" >Cancelar <i class="fa fa-ban"> </i></a>
            
          
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