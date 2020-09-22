@extends('adminlte::page')

@section('title', "Detalhes do {$plan->name}")

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Detalhes do {{ $plan->name }}</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('plans.details.create', $plan->url) }}" class="btn btn-success btn-block">Cadastrar Novo Detalhe</a>
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.details.index', $plan->url) }}" class="active">Detalhes</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">

                @include('admin.includes.alerts')

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="70">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td>
                                <a href="{{ route('plans.details.show', [$plan->url, $detail->id]) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                <a href="{{ route('plans.index', $plan->url) }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
            </div>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif

            <p>Joia Marketing</p>
        </div>
    </div>
@stop
