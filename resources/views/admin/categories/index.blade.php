@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    <h1><a href="{{ route('categories.create') }}" class="btn btn-success">Add</a> 
        Categorias
    </h1>
@stop

@section('content')
    <div class="content row">

        <div class="card card-outline card-success" >
            <div class="box-body" style="padding: 10px">
                <form action="{{ route('categories.search') }}" class="form form-inline" method="POST">
                    @csrf

                    <input type="text" name="title" placeholder="Título" class="form-control" value="{{ $data['title'] ?? '' }}">
                    <input type="text" name="url" placeholder="URL" class="form-control" value="{{ $data['url'] ?? '' }}">
                    <input type="text" name="description" placeholder="Descrição" class="form-control" value="{{ $data['description'] ?? '' }}">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </form>

                {{--
                    @if (isset($search))
                    <p><strong>Resultados para: </strong>{{ $search }}</p>
                    @endif
                --}}
            </div>
        </div>

        <div class="card card-outline card-success">
            <div class="box-body">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">url</th>
                            <th width="120px" scope="col">Ações</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->url }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id)}}" class="badge bg-gradient-yellow">
                                    Editar
                                </a>
                                <a href="{{ route('categories.show', $category->id)}}" class="badge badge-secondary">
                                    Detalhes
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                      
                  @if (isset($data))
                        {{ $categories->appends($data)->links("pagination::bootstrap-4") }}
                  @else
                        {{ $categories->links("pagination::bootstrap-4") }}
                  @endif     
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


 


