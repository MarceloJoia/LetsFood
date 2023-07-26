@extends('adminlte::page')

@section('title', "Detalhes do {$role->name}")

@section('content_header')
    <h1 class="text-primary font-weight-bold">Detalhes do perfil: {{$role->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.show', $role->id)}}">Detalhes</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('roles.edit', $role->id)}}" class="active">Edit</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @method('PUT')
                @include('admin.pages.roles._partials.form')
            </form>
        </div>

        <div class="card-footer">

            <div class="col-sm-12">
                @include('admin.includes.copyright')
            </div>

        </div>
    </div>
@stop
