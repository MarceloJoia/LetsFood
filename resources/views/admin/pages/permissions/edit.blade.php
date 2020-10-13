@extends('adminlte::page')

@section('title', "Detalhes da permissão: {$permission->name}")

@section('content_header')
    <h1>Detalhes da permissão: {{$permission->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('permissions.show', $permission->id)}}">{{ $permission->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('permissions.edit', $permission->id)}}" class="active">Editar</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>

        <div class="card-footer">

            <div class="col-sm-12">
                @include('admin.includes.copyright')
            </div>

        </div>
    </div>
@stop
