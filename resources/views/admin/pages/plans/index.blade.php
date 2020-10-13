@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Planos</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('plans.create') }}" class="btn btn-success btn-block">Cadastrar Plano</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('plans.search') }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar planos" value="{{ $filters['filter'] ?? '' }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
                    <button type="submit" class="form-control" style="width: 50px;"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="170">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-success" title="Visualizar {{ $plan->name }}" alt="Visualizar {{ $plan->name }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('plans.details.index', $plan->url) }}" class="btn btn-success" title="Visualizar detalhes do {{ $plan->name }}" alt="Visualizar detalhes do {{ $plan->name }}"><i class="fas fa-calendar-day"></i></a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-success" title="Visualizar perfis {{ $plan->name }}" alt="Visualizar perfis {{ $plan->name }}"><i class="fas fa-id-card-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
