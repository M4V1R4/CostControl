@extends('adminlte::page')
@section('title','Monedas')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Monedas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('monedas.store') }}" method="POST">
                        @csrf
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6 form-field">
                                        <input id="nombre" name='nombre'  type="text" class="input-text" required>
                                        <span>Nombre corto</span>
                                    </div>
                                    <div class="col-md-6 form-field">
                                        <select name="simbolo" id="simbolo" class="input-select" required>
                                            <option  value selected disabled hidden></option>    
                                            <option value="₡">₡</option>
                                            <option value="$">$</option>
                                            <option value="€">€</option>
                                            <option value="¥">¥</option>
                                        </select> 
                                        <span>Símbolo</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-field">
                                        <input id="descripcion" name='descripcion'  type="text" class="input-text" required>
                                        <span>Descripción</span>
                                    </div>
                                    <div class="col-md-6 form-field">
                                        <input id="tasa" name='tasa'  type="text" class="input-text" required>
                                        <span>Tasa</span>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="d-flex justify-content-center">
                                        <button  type="submit"  id='agregar'  class="btn btn-primary">Agregar</button>
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
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Simbolo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Tasa</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>

                            <tbody>
                                @foreach($monedasl as $moneda)
                                <tr>
                                    <td name='id'>{{$moneda->id }}</td>
                                    <td name='url'>{{$moneda->nombre}}</td>
                                    <td name='simbolo'>{{$moneda->simbolo}}</td>
                                    <td name='format'>{{$moneda->descripcion}}</td>
                                    <td name='tasa'>{{$moneda->tasa}}</td>
                                    <td>
                                        <form method="POST" class="form-delete" action="{{ route('monedas.destroy',$moneda->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-crud"><i class="fa fa-trash"></i></button>
                                            
                                            <a type="submit" href="{{ route('monedas.edit',$moneda->id) }}" class="btn btn-success btn-crud" ><i class="fa fa-edit"></i></a>
                                            
                                        </form>
                                    </td>         
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    <div>
@endsection



