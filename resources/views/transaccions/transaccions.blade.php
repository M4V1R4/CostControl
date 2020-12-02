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
                                <div class="col-md-6 form-field" >
                                    <select class="input-select" name='tipo' id="mostrar" required>
                                            <option  value selected disabled hidden></option>
                                            <option value="Traslado">Traslado</option>
                                            <option value="Ingreso">Ingreso</option>
                                            <option value="Gasto">Gasto</option>
                                    </select>    
                                    <span>Tipo</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <input name='fecha' type="date" class="input-text" required value="2020-12-02" min="2010-01-01">    
                                    <span>Fecha</span>
                                </div>
                            </div>
                            <div class="row">
                                <div id="cuenta-dep" class="col-md-12 form-field mt-3">
                                    <select  id="cuenta2" name="cuenta2" class="input-select">
                                        <option value=""></option>
                                        <!-- <option  value selected disabled hidden></option> -->
                                        @foreach( $cuentas as $key)
                                            <option value="{{ $key->nombre }}">{{ $key->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <span>Cuenta a depositar</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-field">
                                    <select name="cuenta" id="cuenta" class="input-select" required>
                                        <option  value selected disabled hidden></option> 
                                        @foreach( $cuentas as $key )

                                            <option value="{{ $key->nombre}}">{{ $key->nombre}}</option> 

                                        @endforeach
                                    </select>
                                    <span>Cuenta</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <select name="categoria" id="categoria" class="input-select">
                                        <option value="N/A">N/A</option> 
                                        @foreach($sub as $key )
                                            <option value="{{ $key->descripcion }}">{{$key->descripcion}}</option> 
                                        @endforeach
                                    </select>
                                    <span>Categoría</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-field">
                                    <input name='detalle'  type="text" class="input-text" required>
                                    <span>Detalle</span>
                                </div>
                                <div class="col-md-6 form-field">
                                    <input name='monto'  type="text" class="input-text" required >
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
                                <?php if ($transacc->tipo === "Gasto"): ?>
                                    <td style="color:#ff0000" name='sado'>{{$transacc->monto}}</td>
                                <?php else: ?>
                                    <td style="color:#11991a" name='sado'>{{$transacc->monto}}</td>
                                <?php endif ?>
                                
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#cuenta-dep').hide();
    $('#mostrar').change(function() {
        if ($(this).val() == 'Traslado') {
            $('#cuenta-dep').show();
        } else {
            $('#cuenta-dep').hide();
        }
    });
</script>
@endsection