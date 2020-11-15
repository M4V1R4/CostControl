@extends('layouts.app')
@section('content')

  <form action="{{ route('monedas.update',$moneda->id) }}" method="POST">

  @csrf

  @method('PUT')
  
    <div class="modal-dialog ">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Moneda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                  <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                  <input name='nombre'  type="text" class="form-control"  value="{{$moneda->nombre}}">
                  <label for="simbolo" class="col-md-4 col-form-label text-md-right">Simbolo:</label>
                  <input name='simbolo'  type="text" class="form-control"value="{{$moneda->simbolo}}" >
                  <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                  <input name='descripcion'  type="text" class="form-control" value="{{$moneda->descripcion}}">
                  <label for="tasa" class="col-md-4 col-form-label text-md-right">Tasa:</label>
                  <input name='tasa'  type="text" class="form-control" value="{{$moneda->tasa}}">
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-warning" >Editar <i class="fa fa-edit"></i></button>

          <a href="{{ route('monedas.index') }}" class="btn btn-danger" >Cancelar <i class="fa fa-ban"> </i></a>
          
        
        </div>
        
      </div>
    </div>
  </div>

  </form>
@endsection