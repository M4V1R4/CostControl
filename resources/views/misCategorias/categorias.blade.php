@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                
                    
                <form action="{{ route('miscategorias.store') }}" method="POST">

                    @csrf
                    <div class="input-group">
                    <select name='tipo' class="selectpicker" >
                            <option>Ingreso</option>
                            <option>Gasto</option>
                        </select>
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria Padre:</label>
                        <input name='categoriaPadre'  type="text" class="form-control" aria-label="">

                        

                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Sub Categoria:</label>
                        <input name='subCategoria'  type="text" class="form-control" aria-label="" >
                        

                        
                    </div>

                        
                        <button  type="submit"  id='agregar'  class="btn btn-primary">Agregar</button>
                    </div>
                    </div>
                </form>
                

                <hr>
            
                <table id='tabla' class="table table-sm table-light">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Categoria Padre</th>
                        <th scope="col">Sub Categoria</th>
                        
                        
                        </tr>
                    </thead>

                   
                        <tbody>
                     
                            @foreach($miscategoriasl  as $miscategorias)
                            <tr>
                                <td name='id'>{{$miscategorias->id }}</td>
                                <td name='url'>{{$miscategorias->tipo}}</td>
                               
                                <td name='format'>{{$miscategorias->categoriaP}}</td>
                                <td name='saldoInicial'>{{$miscategorias->subcategoria}}</td>
                                

                                <td>
                                    <form method="POST" class="form-delete" action="{{ route('miscategorias.destroy',$miscategorias->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                       
                           
                                        <a type="submit"href="{{ route('miscategorias.edit',$miscategorias->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                   
                                       
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