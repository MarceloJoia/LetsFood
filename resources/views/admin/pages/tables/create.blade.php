@extends('adminlte::page')

@section('title', 'Cadastrar nova mesa')

@section('content_header')
    <h1>Cadastrar nova mesa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item "><a href="{{ route('tables.index') }}">Categorias</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('tables.create') }}">Novo</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('tables.store') }}" method="post">

                @include('admin.pages.tables._partials.form')

                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                        <a href="{{ route('tables.index') }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                        <button type="submit" class="btn btn-primary btn-block"><i class="far fa-share-square"></i> Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">
            @include('admin.includes.copyright')
        </div>
    </div>
@stop
