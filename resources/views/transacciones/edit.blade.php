@extends('layouts.app')
@section('content')

  <form action="{{ route('transacciones.update',$categoria->id) }}" method="POST">

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
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp3(event.target.value)">
                        <option value=""></option> 
                        <option>Ingreso</option>
                          <option>Gasto</option>
                        </select>
                        <input id="valorDeSelect3" type="text" name="tipo" value="{{$categoria->tipo}}">

                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria Padre:</label>                            
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp(event.target.value)">
                        <option value=""></option> 
                            @foreach( $padre as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        
                        <input id="valorDeSelect" type="text" name="catPadre" value="{{$categoria->catPadre}}">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)">
                        <option value=""></option> 
                            @foreach( $sub as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect2" type="text" name="descripcion" value="{{$categoria->descripcion}}">
                        <label for="tasa" class="col-md-4 col-form-label text-md-right">Presupuesto:</label>
                        <input name='presupuesto'  type="text" class="form-control" aria-label="" value="{{$categoria->presupuesto}}" >
                        <div class="from-group mx-sm-4">
                  
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-warning" >Editar <i class="fa fa-edit"></i></button>

          <a href="{{ route('transacciones.index') }}" class="btn btn-danger" >Cancelar <i class="fa fa-ban"> </i></a>
          
        
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