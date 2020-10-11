@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Categorias</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('categories.create') }}" class="btn btn-success btn-block">Cadastrar Categoria</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('categories.search') }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar Categorias" value="{{ $filters['filter'] ?? '' }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('categories.index') }}" class="active">Categorias</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="70">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                {{ $category->description }}
                            </td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-success" title="Visualizar {{ $category->name }}" alt="Visualizar {{ $category->name }}"><i class="fas fa-eye"></i></a>
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

            <p>Joia Marketing</p>
        </div>
    </div>
@stop
