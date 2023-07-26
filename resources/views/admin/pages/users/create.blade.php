@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1 class="text-primary font-weight-bold">Cadastrar um no Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{ route('users.index') }}">Usuários</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('users.create') }}">Novo</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">

                @include('admin.pages.users._partials.form')

                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                        <a href="{{ route('users.index') }}" class="btn btn-success btn-block" title="Voltar para usuários" alt="Voltar para usuários"><i class="fas fa-undo-alt"></i> Voltar</a>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                        <button type="submit" class="btn btn-primary btn-block" title="Cadastrar novo usuário" alt="Cadastrar novo usuário"><i class="far fa-share-square"></i> Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">
            @include('admin.includes.copyright')
        </div>
    </div>
@stop
