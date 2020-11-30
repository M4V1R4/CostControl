@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                    <div class="input-group">

                    <form action="{{ route('reporte1.consultar') }}" method="POST">
                @csrf
                    <div class="input-group">
                    <h4>Sumatoria de gastos e ingresos</h4>
                    
                    <label for="tasa" class="col-md-4 col-form-label text-md-right">Primera fecha:</label>
                    <input id="date" type="date"> 
                    <label for="tasa" class="col-md-4 col-form-label text-md-right">Segunda fecha:</label>    
                    <input id="date" type="date">   
                           
                        <button  type="submit"  id='agregar'  class="btn btn-primary">Consultar</button>

                        @foreach( $cuent as $key  )
                        <label for="simbolo" disabled class="col-md-4 col-form-label text-md-right" >Saldo {{$key->nombre}}</label>
                        <input name='simbolo' disabled type="text" class="form-control" value='{{$key->saldoInicial}}' aria-label="" >

                        @endforeach
                    </div>
                </div>
                </form>  
                </div>
            </div>
        </div>
    </div>
@endsection