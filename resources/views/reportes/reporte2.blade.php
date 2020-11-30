@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                    <div class="input-group">
                    <form  method="GET"> 
                    
                    <form  method="GET"> 
                    <h4>Sumatoria de gastos e ingresos</h4>
                    
                    <label for="tasa" class="col-md-4 col-form-label text-md-right">Primera fecha:</label>
                    <input id="date" type="date"> 
                    <label for="tasa" class="col-md-4 col-form-label text-md-right">Segunda fecha:</label>    
                    <input id="date" type="date">              

                        <button type="submit" onclick="{{ route('reportes.reporte2',$value) }}" class="btn btn-info"   >Consultar</button>

                    </form>

                    

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection