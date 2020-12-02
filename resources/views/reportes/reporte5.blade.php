@extends('adminlte::page')
@section('title','Mes calendario')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Sumatoria de gastos e ingresos por mes</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('reporte5.consultar') }}" method="POST"> 
                        @csrf
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6 form-field">
                                        <select name="mes" id="no_conformidad" class="input-select" required>
                                            <option  value selected disabled hidden></option> 
                                            <option value="1">Enero</option> 
                                            <option value="2">Febrero</option> 
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option> 
                                            <option value="5">Mayo</option> 
                                            <option value="6">Junio</option> 
                                            <option value="7">Julio</option> 
                                            <option value="8">Agosto</option> 
                                            <option value="9">Septiembre</option> 
                                            <option value="10">Octubre</option> 
                                            <option value="11">Noviembre</option> 
                                            <option value="12">Diciembre</option>  
                                        </select>
                                        <span>Seleccione un mes</span>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit"  class="btn btn-info w-100">Consultar</button>
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