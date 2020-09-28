
@extends('adminlte::page')

@section('title', "Planos do Perfil {$profile->name}")

@section('content_header')
    <div class="row">

        <div class="col-sm-9 form-group">
            <h1>Planos do Perfil <strong>{{ $profile->name }}</strong></h1>
        </div>

    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('profiles.plans', $profile->id) }}" class="active">Planos</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="60">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>
                                <a href="{{ route('plans.profiles.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger"><i class="fas fa-unlink"></i></a>
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

            <p>Joia Marketing</p>
        </div>
    </div>
@stop
