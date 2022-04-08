@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>
        Editar Categoria: {{ $category->title }}
    </h1>
@stop

@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">

                    @include ('admin.includes.alerts')
            
                 <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                    <input type="hidden" name="_method" value="PUT">
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


 


