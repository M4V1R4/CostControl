@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                    <div class="input-group">
                    <form  method="GET"> 

                    <h4>Consultar Saldo de Cuenta</h4>
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Cuenta:</label>                            
                        <select name="cuenta" id="no_conformidad">
                        <option value=""></option> 
                            @foreach( $cuentas as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <button type="submit" onclick="{{ route('reportes.reporte1',$value) }}" class="btn btn-info"   >Consultar</button>

                    </form> 

                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection