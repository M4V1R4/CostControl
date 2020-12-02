@extends('adminlte::page')
@section('title','Dashboard')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="h1-home">TRACK YOUR MONEY</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="h1-home">Bienvenido {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop