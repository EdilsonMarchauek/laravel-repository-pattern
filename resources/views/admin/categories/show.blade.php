@extends('adminlte::page')

@section('title', 'Detalhes da Categoria { $category->title }')

@section('content_header')
    <h1>
        Categoria: {{ $category->title }}
    </h1>
@stop

@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">
                <p><strong>ID: </strong>{{ $category->id }}</p>
                <p><strong>Título: </strong>{{ $category->title }}</p>
                <p><strong>URL: </strong>{{ $category->url }}</p>
                <p><strong>Descrição: </strong>{{ $category->description }}</p>

                <hr>

                <form action="{{ route('categories.destroy', $category->id)}}" class="form" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Deletar</button>
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


 


