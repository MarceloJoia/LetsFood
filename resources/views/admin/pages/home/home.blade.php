@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-primary font-weight-bold">Dashboard</h1>
@stop

@section('content')
    <div class="row">

        {{-- Users --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box text-primary">
                <span class="info-box-icon bg-aqua">
                <i class="fas fa-users"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Usuários</span>
                <span class="info-box-number">{{ $totalUsers}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>

        {{-- Table --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box text-primary">
            <span class="info-box-icon bg-aqua">
            <i class="fas fa-dice-d6"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Mesas</span>
            <span class="info-box-number">{{ $totalTables}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>

        {{-- Categories --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box text-primary">
            <span class="info-box-icon bg-aqua">
            <i class="fas fa-layer-group"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Mesas</span>
            <span class="info-box-number">{{ $totalCategories }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>

        {{-- Procucts --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box text-primary">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-hamburger"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Produtos</span>
                <span class="info-box-number">{{ $totalProducts }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>

        @admin ()
            {{-- Tenants --}}
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box text-primary">
                    <span class="info-box-icon bg-aqua">
                        <i class="fas fa-building"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Empresas</span>
                    <span class="info-box-number">{{ $totalTenants }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            <!-- /.info-box -->
            </div>
        @endadmin

        @admin ()
        {{-- Plans --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box text-primary">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-chart-line"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Planos</span>
                <span class="info-box-number">{{ $totalPlans }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>
        @endadmin

        @admin ()
        {{-- Roles --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box text-primary">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-user-tag"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Cargos</span>
                <span class="info-box-number">{{ $totalRoles }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>
        @endadmin

        @admin ()
        {{-- Profiles --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box text-primary">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-id-card-alt"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Perfis</span>
                <span class="info-box-number">{{ $totalProfiles }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>
        @endadmin

        @admin ()
        {{-- Permissions --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box text-primary">
                <span class="info-box-icon bg-aqua">
                    <i class="fas fa-lock"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Permissões</span>
                <span class="info-box-number">{{ $totalPermissions }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>
        @endadmin

        {{-- Categories --}}
        <div class="col-sm-12">
            @include('admin.includes.copyright')
        </div>
    </div>
@stop
