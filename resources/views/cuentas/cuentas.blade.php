@extends('adminlte::page')
@section('title','Monedas')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Cuentas</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cuentas.store') }}" method="POST">
                        @csrf
                        <div class="form">
                            <div class="row">
                                <div class="col-md-6 form-field">
                                    <input name='nombre'  type="text" class="input-text" required>
                                    <span>Nombre corto</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <input name='descripcion'  type="text" class="input-text" required>
                                    <span>Descripción</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-field">
                                    <input name='saldoInicial'  type="text" class="input-text" required>
                                    <span>Saldo inicial</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <select  selected="selected" name="moneda_id" class="input-select" required>
                                        <option  value selected disabled hidden></option>
                                        @foreach( $monedasl as $key)
                                        <option value="{{ $key->id }}">{{ $key->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <span>Moneda</span>
                                </div>
                            </div>
                            <div class="col-md-12">
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
                            <th scope="col">Moneda</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Saldo Inicial</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($cuentasl as $cuenta)
                            <tr>
                                <td name='id'>{{$cuenta->id }}</td>
                                <td name='url'>{{$cuenta->nombre}}</td>
                                @foreach($monedasl as $moneda)
                                    <?php
                                        if ($cuenta->moneda_id == $moneda->id) {
                                            echo "<td name='moneda'>$moneda->nombre</td>";
                                        }
                                    ?>
                                @endforeach
                                <td name='format'>{{$cuenta->descripcion}}</td>
                                <td name='saldoInicial'>{{$cuenta->saldoInicial}}</td>
                                <td>
                                    <form method="POST" class="form-delete" action="{{ route('cuentas.destroy',$cuenta->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-crud"><i class="fa fa-trash"></i></button>

                                        <a type="submit"href="{{ route('cuentas.edit',$cuenta->id) }}" class="btn btn-success btn-crud" ><i class="fa fa-edit"></i></a>
                                    </form>
                                </td>
                             </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
