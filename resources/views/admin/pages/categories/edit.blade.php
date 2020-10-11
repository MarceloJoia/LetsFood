@extends('adminlte::page')

@section('title', "Editar {$user->name}")

@section('content_header')
    <h1>Editar {{ $user->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('users.index') }}">Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post">

                @method('PUT')

                @include('admin.pages.users._partials.form')

                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                        <button type="submit" class="btn btn-primary btn-block"><i class="far fa-share-square"></i> Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">
            <p>Joia Marketing</p>
        </div>
    </div>
@stop
