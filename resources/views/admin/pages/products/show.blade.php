@extends('adminlte::page')

@section('title', "Detalhes da Produto {$product->title}")

@section('content_header')
    <h1 class="text-primary font-weight-bold">{{ $product->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('products.index') }}">Produtos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('products.show', $product->id) }}">{{ $product->title }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table table-striped">

                @include('admin.includes.alerts')

                <tbody>
                    <tr>
                        <th>Imagem</th>
                        <td><img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width:300px;"></td>
                    </tr>
                    <tr>
                        <th>Título</th>
                        <td>{{ $product->title }}</td>
                    </tr>
                    <tr>
                        <th>Flag</th>
                        <td>{{ $product->flag }}</td>
                    </tr>
                    <tr>
                        <th>R$ </th>
                        <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Descrição:</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('products.index') }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
                </div>

                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger form-control"><i class="fas fa-trash-alt"></i> Deletar</button>
                    </form>
                </div>

                <div class="col-12">
                    @include('admin.includes.copyright')
                </div>
            </div>
        </div>
    </div>
@stop
