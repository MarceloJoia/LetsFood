@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Produtos</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('products.create') }}" class="btn btn-success btn-block">Cadastrar Produto</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('products.search') }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar Produtos" value="{{ $filters['filter'] ?? '' }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
                    <button type="submit" class="form-control" style="width: 50px;"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Preço</th>
                        <th width="120">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width:80px;">
                            </td>
                            <td>
                                {{ $product->title }}
                            </td>
                            <td>
                                {{ $product->price }}
                            </td>
                            <td>
                                <a href="{{ route('products.categories.available', $product->id) }}" title="Categorias"  alt="Categorias"  class="btn btn-warning"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-success" title="Visualizar {{ $product->title }}" alt="Visualizar {{ $product->title }}"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
