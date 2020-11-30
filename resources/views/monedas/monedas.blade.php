@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                
                    
                <form action="{{ route('monedas.store') }}" method="POST">

                @csrf
                    <div class="input-group">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                        <input name='nombre'  type="text" class="form-control" aria-label="">
                        <label for="simbolo" class="col-md-4 col-form-label text-md-right">Simbolo:</label>
                        <input name='simbolo'  type="text" class="form-control" aria-label="" >
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                        <input name='descripcion'  type="text" class="form-control" aria-label="" >
                        <label for="tasa" class="col-md-4 col-form-label text-md-right">Tasa:</label>
                        <input name='tasa'  type="text" class="form-control" aria-label="" >

                        
                        <button  type="submit"  id='agregar'  class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                </form>
                
            
                <table id='tabla' class="table table-sm table-light">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Simbolo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Tasa</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>

                    <tr>
                        <tbody>
                    
                            @foreach($monedasl  as $moneda)

                                <td name='id'>{{$moneda->id }}</td>
                                <td name='url'>{{$moneda->nombre}}</td>
                                <td name='simbolo'>{{$moneda->simbolo}}</td>
                                <td name='format'>{{$moneda->descripcion}}</td>
                                <td name='tasa'>{{$moneda->tasa}}</td>

                                <td>
                                    <form method="POST" class="form-delete" action="{{ route('monedas.destroy',$moneda->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        <td>
                           
                                    <a type="submit"href="{{ route('monedas.edit',$moneda->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                            
                                    </td> 
                                    </form>
                                </td>
                                
                                         
                    </tr>
                            @endforeach
                
                        </tbody>
                </table>
            </div>
        </div>
    <div>
        


@endsection



