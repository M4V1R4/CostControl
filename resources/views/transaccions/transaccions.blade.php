@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                
                    
                <form action="{{ route('transaccions.store') }}" method="POST"> 


                    @csrf
                    <div class="input-group">
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Tipo:</label> 
                    <select name='tipo' class="selectpicker" >
                    <option value=""></option> 
                            <option>Ingreso</option>
                            <option>Gasto</option> 
                            <option>Traslado</option>
                    </select>
                    <label for="nombre" class="col-md-4 col-form-label text-md-right">Cuenta:</label>                            
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)">
                        <option value=""></option> 
                            @foreach( $cuentas as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect2" type="text" name="cuenta" value="">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria:</label>                            
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp(event.target.value)">
                        <option value=""></option> 
                            @foreach( $padre as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option>  

                            @endforeach
                        </select>
                        <input id="valorDeSelect" type="text" name="categoria" value="">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Detalle:</label>
                        <input name='detalle'  type="text" class="form-control" aria-label="" >
                        <label for="tasa" class="col-md-4 col-form-label text-md-right">Monto:</label>
                        <input name='monto'  type="text" class="form-control" aria-label="" >

                   

                        
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
                        <th scope="col">Fecha</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Monto</th>
                        
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
                                    <a type="submit" href="{{ route('transaccions.delete',$transacc->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                                    <a type="submit"href="{{ route('transaccions.editar',$transacc->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>  
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