@extends('adminlte::page')

@section('title', "Categorias disponíveis para o produto {$product->title}")

@section('content_header')

    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Categorias disponíveis para o Produto <strong>{{ $product->title }}</strong></h1>
        </div>

        <div class="col- col-sm-6">
            <form action="{{ route('products.categories.available', $product->id) }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar productos" value="{{ $filters['filter'] ?? old('filter') }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
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
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('products.categories', $product->id) }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('products.categories.available', $product->id) }} class="active"">Disponíveis</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">

                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Escolha as categorias e click em Vincular</th>
                    </tr>
                </thead>

                <tbody>
                   <form action="{{ route('products.categories.attach', $product->id) }}" method="POST" class="form-group">
                        @include('admin.includes.alerts')
                        @csrf
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                <button type="submit" class="btn btn-success" class="form-control"><i class="fas fa-link"></i> Vincular</button>
                            </td>
                        </tr>
                   </form>
                </tbody>

            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
