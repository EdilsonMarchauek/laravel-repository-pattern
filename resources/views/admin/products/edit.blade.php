@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')

    <span style="font-size: 20px;">
        Editar Produto: {{ $product->name }}
    </span>
  
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}"> Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.edit', $product->id) }}"> Editar</a></li>
        
    </ol>   
@stop

@section('content')
<div class="content row">

    <div class="card card-outline card-success" >
        <div class="box-body" style="padding: 10px">

            @include ('admin.includes.alerts')
            
            <form action="{{ route('products.update', $product->id) }}" method="POST" class="form">
                @method('PUT')
                @include ('admin.products._partials.form')
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


 


