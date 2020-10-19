@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Cargos</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('roles.create') }}" class="btn btn-success btn-block">Cadastrar Cargo</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('roles.search') }}" method="post">
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.index') }}" class="active">Cargos</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="70">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-success" title="Visualizar {{ $role->name }}" alt="Visualizar {{ $role->name }}"><i class="fas fa-eye"></i></a>
                                {{--
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-info" title="Visualizar permissões do {{ $role->name }}" alt="Visualizar permissões do {{ $role->name }}"><i class="fas fa-user-lock"></i></a>
                                <a href="{{ route('roles.plans', $role->id) }}" class="btn btn-info" title="Planos ligados a esse Perfil" alt="Planos ligados a esse Perfil"><i class="fas fa-globe-americas"></i></a>
                                 --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
