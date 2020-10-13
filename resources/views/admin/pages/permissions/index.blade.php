@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Permissões</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('permissions.create') }}" class="btn btn-success btn-block">Cadastrar Permissoes</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('permissions.search') }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar planos" value="{{ $filters['filter'] ?? '' }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('permissions.index') }}" class="active">Permissões</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="120">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-success" title="Visualizar {{ $permission->name }}" alt="Visualizar {{ $permission->name }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-info"><i class="fas fa-id-card-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
