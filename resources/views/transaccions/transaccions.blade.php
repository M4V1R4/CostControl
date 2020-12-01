@extends('adminlte::page')
@section('title','Transacciones')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                
                    
                <form action="{{ route('transaccions.store') }}" method="POST"> 


                    @csrf
                    <div class="input-group">
                    
                    
                    <div class="container" ng-app="app">
                    <div class="row" ng-controller="ctrl">
                        <div class="col-md-12">
                        <div class="form-group col-md-6">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Tipo:</label> 
                            <select class="form-control"onchange="selecOp1(event.target.value)" name='tipo' ng-model="selectOption" ng-options="o.value as o.name for o in opciones"></select>
                        </div>
                        
                        <div class="form-group col-md-6" ng-if="selectOption == 0" ng-cloak>
                            <label class="control-label">Cuenta a depositar:</label>
                            <select  id="no_conformidad" onchange="selecOp4(event.target.value)">
                            <option value=""></option> 
                            @foreach( $cuentas as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect4" type="text" name="cuenta2" value="">
                        </div>
                        </div>
                    </div>
                    </div>
                    
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Cuenta:</label>                            
                        <select name="no_conformidad" id="no_conformidad" onchange="selecOp2(event.target.value)">
                        <option value=""></option> 
                            @foreach( $cuentas as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>
                        <input id="valorDeSelect2" type="text" name="cuenta" value="">

                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Categoria:</label>
                        <select id="test" name="form_select" onchange="selecOp(event.target.value), showDiv(this)" >
                        <option value=""></option> 
                        <option value="1">SubCategorias</option> 
                            @foreach( $padre as $key => $value )

                                <option value="{{ $key }}">{{ $key}}</option> 

                            @endforeach
                        </select>                            
                         
                        <input id="valorDeSelect" type="text" name="categoria" >

                        <div id="hidden_div" style="display:none;">
                            <select onchange="selecOp3(event.target.value)">
                                <option value=""></option> 
                                    @foreach( $sub as $key => $value )

                                        <option value="{{ $key }}">{{ $key}}</option> 

                                    @endforeach
                            </select>
                        <input id="valorDeSelect3" type="text" name="subcategoria" value="">
                        </div>
                       
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
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.2/angular.min.js"></script>

<script type="text/javascript">

    var valorEnvio = ""
    function selecOp(valor){
     document.getElementById("valorDeSelect").value = valor
    }
    var valorEnvio1 = ""
    function selecOp1(valor){
    document.getElementById("valorDeSelect1").value = valor
    }
 
    var valorEnvio2 = ""
    function selecOp2(valor){
    document.getElementById("valorDeSelect2").value = valor
    }

    var valorEnvio3 = ""
    function selecOp3(valor){
    document.getElementById("valorDeSelect3").value = valor
    }
    var valorEnvio4 = ""
    function selecOp4(valor){
    document.getElementById("valorDeSelect4").value = valor
    }


    var app = angular.module('app', []);
    app.controller('ctrl', ['$scope', function($scope){
    $scope.opciones = [
    { value:0, name: 'Traslado' },
    { value:1, name: 'Gasto' },
    { value:2, name: 'Ingreso' }
    ]
    $scope.selectOption = {};
    }]);


    function showDiv(select){
        if(select.value==1){
        document.getElementById('hidden_div').style.display = "block";
        } else{
        document.getElementById('hidden_div').style.display = "none";
        }
    } 

</script>






@endsection