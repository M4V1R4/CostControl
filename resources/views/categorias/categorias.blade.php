@extends('adminlte::page')
@section('title','Categorias')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Categorías</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="form">
                            <div class="row">
                                <div class="col-md-6 form-field">
                                    <select name="catPadre" id="catPadre" class="input-select">
                                    <option value="N/A">N/A</option> 
                                        @foreach($sub as $key => $value )
                                            <option value="{{ $key }}">{{$key}}</option> 
                                        @endforeach
                                    </select>
                                    <span>Categoría padre</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <select name='tipo' class="input-select" required>
                                        <option  value selected disabled hidden></option>
                                        <option>Ingreso</option>
                                        <option>Gasto</option>
                                    </select>
                                    <span>Tipo</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-field">
                                <input id="valorDeSelect2" type="text" name="descripcion" class="input-text" required>
                                    <span>Descripción</span>
                                </div>
                                <div class="col-md-6 form-field">
                                <input name='presupuesto'  type="text" class="input-text" required>
                                    <span>Presupuesto</span>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="d-flex justify-content-center">
                                    <button  type="submit"  id='agregar'  class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </div>
                            <!-- <input id="valorDeSelect" type="text" name="catPadre"> -->
                            <!-- <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                            <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)">
                            <option value=""></option> 
                                @foreach( $sub as $key => $value )

                                    <option value="{{ $key }}">{{ $key}}</option> 

                                @endforeach
                            </select> -->
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
                            <th scope="col">CatPadre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Presupuesto</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($categoriasl  as $catego)
                            <tr>
                                <td name='id'>{{$catego->id }}</td>

                                <td name='format'>{{$catego->catPadre}}</td>
                                <td name='format'>{{$catego->tipo}}</td>
                                <td name='format'>{{$catego->descripcion}}</td>
                                <td name='saldoInicial'>{{$catego->presupuesto}}</td>
                                <td>
                                    <form method="POST" class="form-delete" action="{{ route('categorias.destroy',$catego->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-crud"><i class="fa fa-trash"></i></button>
                                        <a type="submit"href="{{ route('categorias.edit',$catego->id) }}" class="btn btn-success btn-crud" ><i class="fa fa-edit"></i></a>
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