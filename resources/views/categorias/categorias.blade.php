@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                
                    
                <form action="{{ route('cuentas.store') }}" method="POST">

                    @csrf
                    <div class="input-group">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                        <input name='nombre'  type="text" class="form-control" aria-label="">
                        

                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                        <input name='descripcion'  type="text" class="form-control" aria-label="" >
                        <label for="tasa" class="col-md-4 col-form-label text-md-right">Saldo Inicial:</label>
                        <input name='saldoInicial'  type="text" class="form-control" aria-label="" >
                        <div class="from-group mx-sm-4">
                        <?php /**<label for="imagen">Icono:</label>
                        <input type="file" class="form-control" name="icono" id="imagen">
                        */?>

                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Moneda:</label>

                        <select  selected="selected" name="moneda_id" value="">
                        @foreach( $monedas as $key => $value )

                        <option value="{{ $value }}">{{ $key}}</option>

                        @endforeach
                        </select>
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Moneda</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Saldo Inicial</th>
                        
                        
                        </tr>
                    </thead>

                   
                        <tbody>
                     
                            @foreach($cuentasl  as $cuenta)
                            <tr>
                                <td name='id'>{{$cuenta->id }}</td>
                                <td name='url'>{{$cuenta->nombre}}</td>
                               
                                @foreach($monedasl   as $moneda)
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
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                       
                           
                                        <a type="submit"href="{{ route('cuentas.edit',$cuenta->id) }}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                   
                                       
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