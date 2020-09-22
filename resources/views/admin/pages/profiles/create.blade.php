@extends('adminlte::page')

@section('title', 'Cadastrar novo perfil')

@section('content_header')
    <h1>Cadastrar novo perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('profiles.create') }}" class="active">Novo</a></li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <form action="{{ route('profiles.store') }}" method="POST" class="form">

                @include('admin.pages.profiles._partials.form')

            </form>
        </div>

        <div class="card-footer">
            <p>Joia Marketing</p>
        </div>
    </div>
@stop
