@extends('adminlte::page')
@section('title','Ultimo mes')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Sumatoria de gastos e ingresos del último mes</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="table-responsive-md">
                    <table id='tabla' class="table table-striped table-hover content-table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Detalle</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($info   as $infos)
                            <tr>
                                <td name='url'>{{$infos->tipo}}</td>
                                <?php if ($infos->tipo === "Gasto"): ?>
                                    <td style="color:#ff0000" name='sado'>{{$infos->monto}}</td>
                                <?php else: ?>
                                    <td style="color:#11991a" name='sado'>{{$infos->monto}}</td>
                                <?php endif ?>
                                <td name='format'>{{$infos->fecha}}</td>
                                <td name='format'>{{$infos->categoria}}</td>
                                <td name='format'>{{$infos->detalle}}</td>                               
                             </tr>
                            @endforeach 
                        </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="row mt-2 ml-2">
            <div class="col-md-12">
                <label for="simbolo" disabled class="lbl-report2" >El total es: </label>
                <label for="" disabled class="lbl-report2">{{$total}}</label>
            </div>
        </div>
    </div>
@endsection