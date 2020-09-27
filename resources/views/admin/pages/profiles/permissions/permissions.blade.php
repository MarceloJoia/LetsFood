@extends('adminlte::page')

@section('title', "Permissãoes do Perfil {$profile->name}")

@section('content_header')
    <div class="row">

        <div class="col-sm-9 form-group">
            <h1>Permissãoes do Perfil <strong>{{ $profile->name }}</strong></h1>
        </div>

        <div class="col-sm-3 form-group">
            <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-success btn-block">Add Permissão</a>
        </div>
        
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">{{ $profile->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('profiles.permissions', $profile->id) }}" class="active">Permissões</a></li>
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
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger" title="Desvincular permissão {{ $permission->name }} do perfil {{ $profile->name }}"><i class="fas fa-unlink"></i></a>
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

            <p>Joia Marketing</p>
        </div>
    </div>
@stop
