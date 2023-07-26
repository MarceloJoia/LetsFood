@extends('adminlte::page')

@section('title', "Detalhes da permissão: {$permission->name}")

@section('content_header')
    <h1 class="text-primary font-weight-bold">Detalhes da permissão: {{$permission->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('permissions.show', $permission->id) }}" class="active">{{ $permission->name }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="200">Nome:</th>
                        <td>{{ $permission->name }}</td>
                    </tr>
                    <tr>
                        <th>Descrição:</th>
                        <td>{{ $permission->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">

                <div class=" col-sm-3 form-group">
                    <a href="{{ route('permissions.index') }}" class="btn btn-success form-control" title="Voltar as permissões" alt="Voltar as permissões"><i class="fas fa-undo-alt"></i> Voltar</a>
                </div>

                <div class=" col-sm-3 form-group">
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary form-control" title="Editar a permissões {{ $permission->name }}" alt="Editar a permissões {{ $permission->name }}"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class=" col-sm-3 form-group">
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger form-control" title="Deletar a permissões {{ $permission->name }}" alt="Deletar a permissões {{ $permission->name }}"><i class="fas fa-trash-alt"></i> Deletar</button>
                    </form>
                </div>

                <div class="col-sm-12">
                    @include('admin.includes.copyright')
                </div>

            </div>
        </div>
    </div>
@stop
