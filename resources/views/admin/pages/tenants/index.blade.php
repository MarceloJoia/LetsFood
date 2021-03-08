@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <div class="row">
        <div class="col-sm-9 form-group">
            <h1>Empresas</h1>
        </div>
        <div class="col-sm-3 form-group">
            <a href="{{ route('tenants.create') }}" class="btn btn-success btn-block">Cadastrar Empresa</a>
        </div>
        <div class="col- col-sm-6">
            <form action="{{ route('tenants.search') }}" method="post">
                @csrf
                <div  class="form-inline">
                    <input type="text" name="filter" placeholder="Filtrar Empresas" value="{{ $filters['filter'] ?? '' }}" style="position: relative; margin-bottom: 0px; width: 236px;" class="form-control">
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('tenants.index') }}" class="active">Empresas</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th width="100">Imagem</th>
                        <th>Título</th>
                        <th>Plano</th>
                        <th width="70">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                                @if ($tenant->logo)
                                    <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width:80px;">
                                @else
                                    <img src="{{ url("storage/tenants/seu-logo-aqui.jpg") }}" alt="Logo da empresa" style="max-width:80px;">
                                @endif
                            </td>
                            <td>{{ $tenant->name }}</td>
                            <td>{{ $tenant->plan->name }}</td>
                            <td>
                                {{-- <a href="{{ route('tenants.categories', $tenant->id) }}" title="Categorias"  alt="Categorias"  class="btn btn-warning"><i class="fas fa-layer-group"></i></a> --}}
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-success" title="Detalhes da empresa {{ $tenant->name }}" alt="Detalhes da empresa {{ $tenant->name }}"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

            @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif

            @include('admin.includes.copyright')
        </div>
    </div>
@stop
