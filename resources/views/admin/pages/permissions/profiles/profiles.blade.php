@extends('adminlte::page')

@section('title', "Perfil da Permissãoes {$permissions->name}")

@section('content_header')
    <div class="row">

        <div class="col-sm-9 form-group">
            <h1>Perfil da Permissãoes <strong>{{ $permissions->name }}</strong></h1>
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
                     <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('permissions.profiles', $permissions->id) }}" class="active">Permissões</a></li>
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permissions->id]) }}" class="btn btn-danger"><i class="fas fa-unlink"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif

            <p>Joia Marketing</p>
        </div>
    </div>
@stop
