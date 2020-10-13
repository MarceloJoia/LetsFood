@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Usuários</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('users.create') }}" class="btn btn-success btn-block">Cadastrar Usuário</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('users.search') }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar Usuários" value="{{ $filters['filter'] ?? '' }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th width="70">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-success" title="Visualizar {{ $user->name }}" alt="Visualizar {{ $user->name }}"><i class="fas fa-eye"></i></a>
                                {{-- <a href="{{ route('users.details.index', $user->url) }}" class="btn btn-success" title="Visualizar detalhes do {{ $user->name }}" alt="Visualizar detalhes do {{ $user->name }}"><i class="fas fa-calendar-day"></i></a>
                                <a href="{{ route('users.profiles', $user->id) }}" class="btn btn-success" title="Visualizar perfis {{ $user->name }}" alt="Visualizar perfis {{ $user->name }}"><i class="fas fa-id-card-alt"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
