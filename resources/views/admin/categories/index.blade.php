@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1><a href="{{ route('categories.create') }}" class="btn btn-success">Add</a> Categorias</h1>
@stop

@section('content')
    <div class="content row">
        <div class="box">
            <div class="box-body">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">url</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->url }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                #ações
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
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


 


