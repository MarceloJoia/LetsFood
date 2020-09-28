@extends('adminlte::page')

@section('title', "Perfis disponíveis para o Plano {$plan->name}")

@section('content_header')

    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Perfis disponíveis para o Plano <strong>{{ $plan->name }}</strong></h1>
        </div>

        <div class="col- col-sm-6">
            <form action="{{ route('plans.profiles.available', $plan->id) }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar planos" value="{{ $filters['filter'] ?? old('filter') }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
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
                    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('plans.profiles', $plan->id) }}">Perfis</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('plans.profiles.available', $plan->id) }} class="active"">Disponíveis</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">

                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Tipo de permissão</th>
                    </tr>
                </thead>

                <tbody>
                   <form action="{{ route('plans.profiles.attach', $plan->id) }}" method="POST" class="form-group">
                        @include('admin.includes.alerts')
                        @csrf
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                </td>
                                <td>
                                    {{ $profile->name }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                <button type="submit" class="btn btn-success" class="form-control"><i class="fas fa-link"></i> Vincular</button>
                            </td>
                        </tr>
                   </form>
                </tbody>

            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif

            <p>Joia Marketing</p>
        </div>
    </div>
@stop
