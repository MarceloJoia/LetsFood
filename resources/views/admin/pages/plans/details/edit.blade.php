@extends('adminlte::page')

@section('title', "Adicionar detalhes ao {$plan->name}")

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Adicionar detalhes ao {{ $plan->name }}</h1>
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.details.edit', [$plan->url, $detail->id]) }}" class="active">Editar</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('plans.details.update', [$plan->url, $detail->id]) }}" method="post" class="form">
                @method('PUT')

                @include('admin.pages.plans.details._partials.form')

            </form>
        </div>

        <div class="card-footer">
            <p>Joia Marketing</p>
        </div>
    </div>
@stop
