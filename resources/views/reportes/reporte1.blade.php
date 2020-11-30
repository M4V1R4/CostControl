@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                <form action="{{ route('reporte1.consultar') }}" method="POST">
                @csrf
                    <div class="input-group">
                    <h4>Consultar Saldo de Cuenta</h4>
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Cuenta:</label>                            
                            <select name="cuenta" id="cuenta" >
                            <option value=""></option> 
                                @foreach( $cuentas as $key => $value )
                                    
                                    <option value="{{ $value }}">{{ $key}}</option> 
                                    
                                @endforeach
                            </select> 
                                            
                                                
                                                
                        
                        <button  type="submit"  id='agregar'  class="btn btn-primary">Consultar</button>
                       
                        
                        @foreach($cuent as $key  )
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