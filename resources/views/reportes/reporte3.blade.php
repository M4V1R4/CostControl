@extends('adminlte::page')
@section('title','Ultimo mes')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="input-group">
                    <h4>Sumatoria de gastos e ingresos del ultimo mes</h4>
                    <table id='tabla' class="table table-sm table-light">
                    <thead>
                        <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Detalle</th>
                        </tr>
                    </thead>

                   
                        <tbody>
                            @foreach($info   as $infos)
                            <tr>
                                <td name='url'>{{$infos->tipo}}</td>
                                <td name='format'>{{$infos->categoria}}</td>
                                <td name='format'>{{$infos->detalle}}</td>                               
                             </tr>
                            @endforeach
                            
                        </tbody>
                </table>
                    <label for="simbolo" disabled class="col-md-4 col-form-label text-md-right" >El total es: </label>
                    <input name='simbolo' disabled type="text" class="form-control" value='{{$total}}' aria-label="" >
                   

                    </div>
                </div>
                   

                </div>
            </div>
        </div>
    </div>
@endsection