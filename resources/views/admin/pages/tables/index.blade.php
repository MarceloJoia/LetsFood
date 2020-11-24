@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Mesas</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('tables.create') }}" class="btn btn-success btn-block">Cadastrar Categoria</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('tables.search') }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar Mesas" value="{{ $filters['filter'] ?? '' }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('tables.index') }}" class="active">Categorias</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Identify</th>
                        <th>Descrição</th>
                        <th width="120">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td>
                                {{ $table->identify }}
                            </td>
                            <td>
                                {{ $table->description }}
                            </td>
                            <td>
                                <a href="{{ route('tables.qrcode', $table->identify) }}" class="btn btn-success" target="_blank">
                                    <i class="fas fa-qrcode"></i>
                                </a>
                                <a href="{{ route('tables.show', $table->id) }}" class="btn btn-success" title="Visualizar {{ $table->identify }}" alt="Visualizar {{ $table->identify }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $tables->appends($filters)->links() !!}
            @else
                {!! $tables->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
