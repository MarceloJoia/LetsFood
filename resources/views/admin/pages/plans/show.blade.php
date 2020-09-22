@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <h1>{{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.index') }}">Planos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table table-striped">

                @include('admin.includes.alerts')

                <tbody>
                    <tr>
                        <th>Nome:</th>
                        <td>{{ $plan->name }}</td>
                    </tr>
                    <tr>
                        <th>URL:</th>
                        <td>{{ $plan->url }}</td>
                    </tr>
                    <tr>
                        <th>Nome:</th>
                        <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Nome:</th>
                        <td>{{ $plan->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('plans.index') }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
                </div>
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Editar</a>
                </div>
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <form action="{{ route('plans.destroy', $plan->url) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger form-control"><i class="fas fa-trash-alt"></i> Deletar</button>
                    </form>
                </div>
                <div class="col-12">
                    <h4>Joia Marketing</h4>
                </div>
            </div>
        </div>
    </div>
@stop
