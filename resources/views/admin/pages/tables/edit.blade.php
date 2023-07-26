@extends('adminlte::page')

@section('title', "Editar a mesa {$table->identify}")

@section('content_header')
    <h1 class="text-primary font-weight-bold">Editar a mesa {{ $table->identify }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('tables.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('tables.show', $table->id) }}">{{ $table->identify }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('tables.update', $table->id) }}" method="post">

                @method('PUT')

                @include('admin.pages.tables._partials.form')

                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                        <a href="{{ route('tables.show', $table->id) }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
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
