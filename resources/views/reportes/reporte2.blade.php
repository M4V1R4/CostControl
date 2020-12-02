@extends('adminlte::page')
@section('title','Entre dos fechas')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Sumatoria de gastos e ingresos entre dos fechas</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('reporte2.consultar') }}" method="POST">
                        @csrf
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <label for="tasa" class="lbl-report2">Primer fecha:</label>
                                        <input class="input-date" name="fecha1"id="date" type="date"> 
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <label for="tasa" class="lbl-report2">Segunda fecha:</label>    
                                        <input class="input-date" name="fecha2"id="date" type="date">   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="d-flex justify-content-center mt-3">
                                                <button  type="submit"  id='agregar'  class="btn btn-primary">Consultar</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
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
                <label for="" disabled class="lbl-report2">{{$total ?? ''}}</label>
            </div>
        </div>
    </div>
@endsection