@extends('adminlte::page')

@section('title', 'Cadastrar novo Cargo')

@section('content_header')
    <h1 class="text-primary font-weight-bold">Cadastrar novo Cargo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.create') }}" class="active">Novo</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST" class="form">

                @include('admin.pages.roles._partials.form')

            </form>
        </div>

        <div class="card-footer">
            @include('admin.includes.copyright')
        </div>
    </div>
@stop
