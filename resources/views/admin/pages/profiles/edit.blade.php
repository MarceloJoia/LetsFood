@extends('adminlte::page')

@section('title', "Detalhes do {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil: {{$profile->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.show', $profile->id)}}">Detalhes</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('profiles.edit', $profile->id)}}" class="active">Edit</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" method="post">
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>

        <div class="card-footer">

            <div class="col-sm-12">
                @include('admin.includes.copyright')
            </div>

        </div>
    </div>
@stop
