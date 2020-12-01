@extends('adminlte::page')
@section('title','Transacciones')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Transacciones</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('transaccions.store') }}" method="POST"> 
                    @csrf
                        <div class="form">
                            <div class="row">
                                <div class="col-md-6 form-field">
                                    <select name='tipo' class="input-select" required>
                                        <option  value selected disabled hidden></option> 
                                        <option>Ingreso</option>
                                        <option>Gasto</option> 
                                        <option>Traslado</option>
                                    </select>
                                    <span>Tipo</span>
                                </div>
                                <div class="col-md-6 form-field">
                                <input class="form-control" type="date" value="" id="fecha" name="fecha" class="input-text" required>
                                <span>Fecha</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)" class="input-select" required>
                                        <option  value selected disabled hidden></option>
                                        @foreach( $cuentas as $key => $value )
                                            <option value="{{ $key }}">{{ $key}}</option> 
                                        @endforeach
                                    </select>
                                    <span>Cuenta</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <select name="no_conformidad" id="no_conformidad" onchange="selecOp(event.target.value)" class="input-select" required>
                                        <option  value selected disabled hidden></option> 
                                        @foreach( $padre as $key => $value )
                                            <option value="{{ $key }}">{{ $key}}</option>
                                        @endforeach
                                    </select>
                                    <span>Categoría</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <input name='detalle'  type="text" class="input-text" required>
                                    <span>Detalle</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <input name='monto'  type="text" class="input-text" required>
                                    <span>Monto</span>
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
                            <th scope="col">Tipo</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cuenta</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaccionesl  as $transacc)
                        <tr>
                            <td name='id'>{{$transacc->id}}</td>
                            <td name='url'>{{$transacc->tipo}}</td>
                            <td name='format'>{{$transacc->fecha}}</td>
                            <td name='s'>{{$transacc->cuenta}}</td>
                            <td name='sa'>{{$transacc->categoria}}</td>
                            <td name='salal'>{{$transacc->detalle}}</td>
                            <td name='sado'>{{$transacc->monto}}</td>
                            <td>
                                <a type="submit" href="{{ route('transaccions.delete',$transacc->id) }}" class="btn btn-danger btn-crud"><i class="fa fa-trash"></i></a>

                                <a type="submit"href="{{ route('transaccions.editar',$transacc->id) }}" class="btn btn-success btn-crud" ><i class="fa fa-edit"></i></a>  
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    var valorEnvio = ""

    function selecOp(valor){
    document.getElementById("valorDeSelect").value = valor
    }

 
    var valorEnvio2 = ""

    function selecOp2(valor){
    document.getElementById("valorDeSelect2").value = valor
    }


</script>
@endsection