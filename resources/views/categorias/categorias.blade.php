@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                
                    
                <form action="{{ route('categorias.store') }}" method="POST">

                    @csrf
                    <div class="input-group">
                    <select name='tipo' class="selectpicker" >
                            <option>Ingreso</option>
                            <option>Gasto</option>
                    </select>
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria Padre:</label>                            
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp(event.target.value)">
                        <option value=""></option> 
                            @foreach( $padre as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect" type="text" name="catPadre" value="">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)">
                        <option value=""></option> 
                            @foreach( $sub as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect2" type="text" name="descripcion" value="">
                        <label for="tasa" class="col-md-4 col-form-label text-md-right">Presupuesto:</label>
                        <input name='presupuesto'  type="text" class="form-control" aria-label="" >
                        <div class="from-group mx-sm-4">
                        <?php /**<label for="imagen">Icono:</label>
                        <input type="file" class="form-control" name="icono" id="imagen">
                        */?>

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
                        <th scope="col">CatPadre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Presupuesto</th>
                        
                        
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
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                       
                           
                                        <a type="submit"href="{{ route('categorias.edit',$catego->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                   
                                       
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