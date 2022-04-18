@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')

    <span style="font-size: 20px;"><a href="{{ route('products.create') }}" class="btn btn-success">Add</a> 
        Produtos
    </span>
  
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}"> Produtos</a></li>
        
    </ol>   
@stop

@section('content')
    <div class="content row">

        <div class="card card-outline card-success" >
            <div class="box-body" style="padding: 10px">
                <form action="{{ route('products.search')}}" method="POST" class="form form-inline">
                    @csrf
                    <select name="category" class="form-control">
                        <option value="">Categoria</option>
                        {{-- Para utilizar a variavel $categories precisa criar no AppServiceProvider.php passando pra cá--}}
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="name" placeholder="Nome:" class="form-control">
                    <input type="text" name="price" placeholder="Preço:" class="form-control">

                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </form>
            </div>
        </div>

        <div class="card card-outline card-success">
            <div class="box-body">

                @include('admin.includes.alerts')
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Preço</th>
                            <th width="150px" scope="col">Ações</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->name }}</th>
                            <td>{{ $product->category->title }}</td>
                            <td>R$ {{ $product->price }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id)}}" class="badge bg-gradient-yellow">
                                    Editar
                                </a>
                                <a href="{{ route('products.show', $product->id)}}" class="badge badge-secondary">
                                    Detalhes
                                </a>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="/js/app.js"></script>
@stop


 


