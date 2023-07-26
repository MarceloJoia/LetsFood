@extends('adminlte::page')

@section('title', "Detalhes do {$profile->name}")

@section('content_header')
    <h1 class="text-primary font-weight-bold">Detalhes do perfil: {{$profile->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('profiles.show', $profile->id)}}" class="active">Detalhes</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nome:</th>
                        <td>{{ $profile->name }}</td>
                    </tr>
                    <tr>
                        <th>Descrição:</th>
                        <td>{{ $profile->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">

                <div class=" col-sm-3 form-group">
                    <a href="{{ route('profiles.index') }}" class="btn btn-success form-control">Voltar</a>
                </div>

                <div class=" col-sm-3 form-group">
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary form-control">Editar</a>
                </div>

                <div class=" col-sm-3 form-group">
                    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger form-control">Deletar</button>
                    </form>
                </div>

                <div class="col-sm-12">
                    @include('admin.includes.copyright')
                </div>

            </div>
        </div>
    </div>
@stop
