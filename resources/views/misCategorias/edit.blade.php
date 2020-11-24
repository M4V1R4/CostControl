@extends('layouts.app')
@section('content')

  <form action="{{ route('miscategorias.update',$miscatego->id) }}" method="POST">

  @csrf

  @method('PUT')
  
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
            <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria Padre:</label>                            
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp(event.target.value)">

                            @foreach( $padre as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect" type="text" name="id_catPadre" value="{{$miscatego->cantPadre}}">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">SubCategoria:</label>
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)">

                            @foreach( $sub as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect2" type="text" name="descripcion" value="{{$miscatego->subCategoria}}">
                        
                  
                  
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-warning" >Editar <i class="fa fa-edit"></i></button>

          <a href="{{ route('miscategorias.index') }}" class="btn btn-danger" >Cancelar <i class="fa fa-ban"> </i></a>
          
        
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
   

</script>
@endsection