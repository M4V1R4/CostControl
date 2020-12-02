@extends('adminlte::page')
@section('title','Saldo Actual')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Saldo actual por cuenta</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('reporte1.consultar') }}" method="POST">
                        @csrf
                            <div class="form">
                                <div class="row">
                                    <div class="col-md-6 form-field">
                                        <select name="cuenta" id="cuenta" class="input-select" required>
                                        <option  value selected disabled hidden></option> 
                                        @foreach( $cuentas as $key )

                                            <option value="{{ $key->id}}">{{ $key->nombre}}</option> 

                                        @endforeach
                                        </select>
                                        <span class="report">Cuenta</span>
                                    </div>
                                    <div class="col-md-6 form-field">
                                        <div class="d-flex justify-content-center">
                                            <button  type="submit"  id='agregar'  class="btn btn-primary w-100">Consultar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($cuent as $key)
                    <div class="row mt-5 text-center">
                        <div class="col-md-12">
                            <label for="simbolo" disabled class="label-account" >Cuenta: {{$key->nombre}}</label>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <label disabled class="label-balance" for="">Saldo: {{$key->saldoInicial}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection