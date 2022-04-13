@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')

    <span style="font-size: 20px;">
        Cadastrar Novo Produto
    </span>
  
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}"> Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.create') }}"> Cadastrar</a></li>
        
    </ol>   
@stop

@section('content')
<div class="content row">

    <div class="card card-outline card-success" >
        <div class="box-body" style="padding: 10px">
            <form action="{{ route('products.store') }}" method="post" class="form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="url" placeholder="URL" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="price" placeholder="Preço" class="form-control">
                </div>
                <div class="form-group">
                    <select name="category_id" class="form-control">
                        <option value="">Escolha</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach   
                    </select>
                </div>
                <div class="form-group">
                   <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
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


 


