@extends('adminlte::page')

@section('title', "Detalhes da Categoria {$category->name}")

@section('content_header')
    <h1>{{ $category->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table table-striped">

                @include('admin.includes.alerts')

                <tbody>
                    <tr>
                        <th>Nome:</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <th>URL</th>
                        <td>{{ $category->url }}</td>
                    </tr>
                    <tr>
                        <th>Descrição:</th>
                        <td>{{ $category->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('categories.index') }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
                </div>

                {{-- Editar usuário --}}
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Editar</a>
                </div>

                {{-- Deletar usuário --}}
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
