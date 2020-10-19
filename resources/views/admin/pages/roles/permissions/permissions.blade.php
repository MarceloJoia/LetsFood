@extends('adminlte::page')

@section('title', "Permissãoes do cargo {$role->name}")

@section('content_header')
    <div class="row">

        <div class="col-sm-9 form-group">
            <h1>Permissãoes do cargo <strong>{{ $role->name }}</strong></h1>
        </div>

        <div class="col-sm-3 form-group">
            <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-success btn-block">Add Permissão</a>
        </div>

    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ $role->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.permissions', $role->id) }}" class="active">Permissões</a></li>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('roles.permission.detach', [$role->id, $permission->id]) }}" class="btn btn-danger" title="Desvincular permissão {{ $permission->name }} do perfil {{ $role->name }}"><i class="fas fa-unlink"></i></a>
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
