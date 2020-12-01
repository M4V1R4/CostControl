@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-20">
                <form action="{{ route('reporte6.consultar') }}" method="POST"> 
                    @csrf
                    <div class="input-group">
                        <h6>Seleccione el año:</h6>
                        <select name="anno">
                            <?php
                            for($i=date('o'); $i>=2010; $i--){
                                if ($i == date('o'))
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                else
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                            <button type="submit"  class="btn btn-info">Consultar</button>

                        </form>
                        <table id='tabla' class="table table-sm table-light">
                            <thead>
                                <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Detalle</th>
                                </tr>
                            </thead>

                        
                                <tbody>
                                    @foreach($info   as $infos)
                                    <tr>
                                        <td name='url'>{{$infos->tipo}}</td>
                                        <td name='format'>{{$infos->categoria}}</td>
                                        <td name='format'>{{$infos->detalle}}</td>                               
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                        </table>
                        <label for="simbolo" disabled class="col-md-4 col-form-label text-md-right" >El total es: </label>
                        <input name='simbolo' disabled type="text" class="form-control" value='{{$total ?? ''}}' aria-label="" >
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection