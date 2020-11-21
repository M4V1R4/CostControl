@extends('layouts.app')
@section('content')

  <form action="{{ route('miscategorias.update',$miscategorias->id) }}" method="POST">

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
                  <input name='categoriaPadre'  type="text" class="form-control" value="{{$miscategorias->categoriaP}}">
                  <label for="descripcion" class="col-md-4 col-form-label text-md-right">Sub Categoria:</label>
                  <input name='subCategoria'  type="text" class="form-control" value="{{$miscategorias->subcategoria}}" >
                        
                  <select  selected="selected" name="moneda_id" value="{{$cuenta->moneda_id}}">
                        @foreach( $monedas as $key => $value )

                        <option value="{{ $value }}">{{ $key}}</option>

                        @endforeach
                    </select>
                  
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
@endsection