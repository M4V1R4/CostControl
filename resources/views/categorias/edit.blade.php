@extends('layouts.app')
@section('content')

  <form action="{{ route('cuentas.update',$cuenta->id) }}" method="POST">

  @csrf

  @method('PUT')
  
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Cuenta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                  <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                  <input name='nombre'  type="text" class="form-control"  value="{{$cuenta->nombre}}">
                  <label for="simbolo" class="col-md-4 col-form-label text-md-right">Moneda:</label>
                  
                  <select  selected="selected" name="moneda_id" value="{{$cuenta->moneda_id}}">
                        @foreach( $monedas as $key => $value )

                        <option value="{{ $value }}">{{ $key}}</option>

                        @endforeach
                    </select>
                  
                  <label for="desc" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                  <input name='descripcion'  type="text" class="form-control" value="{{$cuenta->descripcion}}">
                  <label for="tasa" class="col-md-4 col-form-label text-md-right">Saldo Inicial:</label>
                  <input name='saldoInicial'  type="text" class="form-control" value="{{$cuenta->saldoInicial}}">
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-warning" >Editar <i class="fa fa-edit"></i></button>

          <a href="{{ route('cuentas.index') }}" class="btn btn-danger" >Cancelar <i class="fa fa-ban"> </i></a>
          
        
        </div>
        
      </div>
    </div>
  </div>

  </form>
@endsection