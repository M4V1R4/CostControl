@extends('adminlte::page')
@section('title','Mes calendario')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">

                    <form action="{{ route('reporte5.consultar') }}" method="POST"> 
                    @csrf
                    <div class="input-group">
                        <h6>Seleccione el mes:</h6>
                                    
                        <select name="mes" id="no_conformidad">
                        
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
                            <button type="submit"  class="btn btn-info">Consultar</button>

                        </form>
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
                        <input name='simbolo' disabled type="text" class="form-control" value='{{$total ?? ''}}' aria-label="" >

                </div>
            </div>
        </div>
    </div>


@endsection