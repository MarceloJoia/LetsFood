@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1 class="text-primary font-weight-bold">Perfis</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('profiles.create') }}" class="btn btn-success btn-block">Cadastrar Perfil</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('profiles.search') }}" method="post">
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.index') }}" class="active">Perfis</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="170">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-success" title="Ver os detalhes do Perfil {{ $profile->name }}" alt="Ver os detalhes do Perfil {{ $profile->name }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-info" title="Ver permissões do {{ $profile->name }}" alt="Ver permissões do {{ $profile->name }}"><i class="fas fa-user-lock"></i></a>
                                <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info" title="Planos ligados ao Perfil {{ $profile->name }}" alt="Planos ligados ao Perfil {{ $profile->name }}"><i class="fas fa-globe-americas"></i></a>
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

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
