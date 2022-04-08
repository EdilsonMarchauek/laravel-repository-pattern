@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
    <h1>
        Cadastrar Nova Categoria
    </h1>
@stop

@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">

                    @include ('admin.includes.alerts')
            
                 <form action="{{ route('categories.store') }}" class="form" method="POST">
                    @include ('admin.categories._partials.form')
                </form> 
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="/css/app.css" rel="stylesheet">
@stop

@section('js')
    <script src="/js/app.js"></script>
@stop


 


