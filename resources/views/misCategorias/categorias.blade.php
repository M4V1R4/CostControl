@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                
                    
                <form action="{{ route('miscategorias.store') }}" method="POST">

                    @csrf
                    <div class="input-group">
                        
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria Padre:</label>                            
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp(event.target.value)">
                        <option value=""></option> 
                            @foreach( $padre as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect" type="text" name="categoriaP" value="">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Sub Categoria:</label>
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)">
                        <option value=""></option> 
                            @foreach( $sub as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect2" type="text" name="subcategoria" value="">

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
                        <th scope="col">Categoria Padre</th>
                        <th scope="col">Sub Categoria</th>
                        
                        
                        </tr>
                    </thead>

                   
                        <tbody>
                     
                            @foreach($miscategoriasl  as $miscatego)
                            <tr>
                                <td name='id'>{{$miscatego->id}}</td>
                                <td name='url'>{{$miscatego->tipo}}</td>
                               
                                <td name='format'>{{$miscatego->categoriaP}}</td>
                                <td name='saldoInicial'>{{$miscatego->subcategoria}}</td>
                                

                                <td>
                                <form method="POST" class="form-delete" action="{{ route('miscategorias.destroy', $miscatego->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                        <a type="submit"href="{{ route('miscategorias.edit',$miscatego->id)}}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                   
                                       
                                    </form>
                                    
                                </td>
                             </tr>
                            @endforeach
                
                        </tbody>
                </table>
            </div>
        </div>
    <div>
        

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