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
                 <form action="{{ route('categories.store') }}" class="form" method="POST">
                     @csrf
                     <div class="form-group">
                         <input type="text" name="title" class="form-control" placeholder="Título">
                     </div>
                     <div class="form-group">
                        <input type="text" name="url" class="form-control" placeholder="URL">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="description" class="form-control" cols="30" rows="10" placeholder="Descrição"></textarea>
                    </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-success">Enviar</button>
                     </div>
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


 


