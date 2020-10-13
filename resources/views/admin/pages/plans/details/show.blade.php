@extends('adminlte::page')

@section('title', "Detalhes do {$plan->name}")

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Detalhes: {{ $plan->name }}</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('plans.details.index', $plan->url) }}">Detalhes</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.details.show', [$plan->url, $detail->id]) }}" class="active">{{ $detail->name}}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <th colspan="10"><h2>{{ $detail->name }}</h2></th>
                </thead>
                <tbody>
                    <tr>
                        <th width="100">Nome:</th>
                        <td>{{ $detail->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col- col-sm-3 form-group">
                <a href="{{ route('plans.details.index', $plan->url) }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
            </div>
            <div class="col- col-sm-3 form-group">
                <a href="{{ route('plans.details.edit', [$plan->url, $detail->id]) }}" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Editar</a>
            </div>
            <div class="col- col-sm-3 form-group">
                <form action="{{ route('plans.details.destroy', [$plan->url, $detail->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i> Deletar</button>
                </form>
            </div>
        </div>

        <div class="card-footer">
            @include('admin.includes.copyright')
        </div>
    </div>
@stop
