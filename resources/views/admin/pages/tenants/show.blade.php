@extends('adminlte::page')

@section('title', "Detalhes da Tenant {$tenant->name}")

@section('content_header')
    <h1>Detalhes da Tenant {{ $tenant->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('tenants.index') }}">Produtos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('tenants.show', $tenant->id) }}">{{ $tenant->name }}</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <table class="table table-striped">

                @include('admin.includes.alerts')

                <tbody>
                    <tr>
                        <th>Imagem</th>
                        <td><img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width:300px;"></td>
                    </tr>
                    <tr>
                        <th width="200">Plano</th>
                        <td>{{ $tenant->plan->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">Mensalidade</th>
                        <td>R$ {{ number_format($tenant->plan->price, 2,',','.') }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $tenant->name }}</td>
                    </tr>
                    <tr>
                        <th>URL</th>
                        <td>{{ $tenant->url }}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>{{ $tenant->email }}</td>
                    </tr>
                    <tr>
                        <th>CNPJ</th>
                        <td>{{ $tenant->cnpj }}</td>
                    </tr>
                    <tr>
                        <th>Ativo</th>
                        <td>{{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}</td>
                    </tr>

                    <tr>
                        <th colspan="500"><h3>Assinatura</h3></th>
                    </tr>
                    <tr>
                        <th>Data Assinatura:</th>
                        <td>{{ $tenant->subscription }}</td>
                    </tr>
                    <tr>
                        <th>Expira:</th>
                        <td>{{ $tenant->expires_at }}</td>
                    </tr>
                    <tr>
                        <th>Identificador:</th>
                        <td>{{ $tenant->subscription_id }}</td>
                    </tr>
                    <tr>
                        <th>Ativo?</th>
                        <td>{{ $tenant->subscription_active ? 'SIM' : 'NÃO'}}</td>
                    </tr>
                    <tr>
                        <th>Cancelou?</th>
                        <td>{{ $tenant->subscription_suspended ? 'SIM' : 'NÃO'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('tenants.index') }}" class="btn btn-success btn-block"><i class="fas fa-undo-alt"></i> Voltar</a>
                </div>

                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class="ccol-sm-6 col-md-3 col-lg-4 col-xl-2 form-group">
                    <form action="{{ route('tenants.destroy', $tenant->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger form-control"><i class="fas fa-trash-alt"></i> Deletar</button>
                    </form>
                </div>

                <div class="col-12">
                    @include('admin.includes.copyright')
                </div>
            </div>
        </div>
    </div>
@stop
