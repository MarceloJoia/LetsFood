@extends('adminlte::page')

@section('title', "Cargos do usuário {$user->name}")

@section('content_header')
    <div class="row">

        <div class="col-sm-9 form-group">
            <h1>Cargo do usuário <strong>{{ $user->name }}</strong></h1>
        </div>

        <div class="col-sm-3 form-group">
            <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-success btn-block">Add Cargo</a>
        </div>

    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuário</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.roles', $user->id) }}" class="active">Cargos</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}" class="btn btn-danger" title="Desvincular permissão {{ $role->name }} do perfil {{ $role->name }}"><i class="fas fa-unlink"></i></a>
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
