@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                    <div class="input-group">
                    

                    <form  method="GET"> 
                    
                    <h6>Ultimo Año:</h6>
                                  

                        <button type="submit" onclick="{{ route('reportes.reporte4',$value) }}" class="btn btn-info"   >Consultar</button>

                    </form>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection