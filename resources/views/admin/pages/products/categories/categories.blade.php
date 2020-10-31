@extends('adminlte::page')

@section('title', "Categoria do produto {$product->title}")

@section('content_header')
    <div class="row">

        <div class="col-sm-9 form-group">
            <h1>Categoria do produto <strong>{{ $product->title }}</strong></h1>
        </div>

        <div class="col-sm-3 form-group">
            <a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-success btn-block">Add Categorias</a>
        </div>

    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Planos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('products.categories', $product->id) }}" class="active">Perfis</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="60">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('products.category.detach', [$product->id, $category->id]) }}" class="btn btn-danger"><i class="fas fa-unlink"></i></a>
                            </td>
                        </tr>
                    @endforeach
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
