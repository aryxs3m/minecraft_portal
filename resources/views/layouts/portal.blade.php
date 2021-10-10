@extends('layouts.html')

@push('head')
    <link href="/assets/styles/dashboard.css" rel="stylesheet">
@endpush

@section('body')
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/home">{{ config('app.name') }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="/logout">{{ __('auth.logout') }}</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/home">
                                {{ __('menu.home') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            @can('user.skin.change')
                            <a class="nav-link" aria-current="page" href="/skin">
                                {{ __('menu.skinchange') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            @endcan
                            <a class="nav-link" aria-current="page" href="/password-change">
                                {{ __('menu.passwordchange') }}
                            </a>
                        </li>
                    </ul>

                    @canany('admin.players.list','admin.rcon.simple','admin.rcon.expert','admin.users.manage_roles','admin.users.roles.edit','admin.rcon.edit_simple','admin.logs')
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{ __('menu.groups.admin') }}</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        @can('admin.players.list')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/players">
                                {{ __('menu.admin.players') }}
                            </a>
                        </li>
                        @endcan
                        @can('admin.rcon.simple')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/rcon-simple">
                                {{ __('menu.admin.rcon_simple') }}
                            </a>
                        </li>
                        @endcan
                        {{--
                        @can('admin.rcon.expert')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/rcon-expert">
                                {{ __('menu.admin.rcon_expert') }}
                            </a>
                        </li>
                        @endcan
                        @can('admin.users.manage_roles')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/users/manage_roles">
                                {{ __('menu.admin.manage_roles') }}
                            </a>
                        </li>
                        @endcan
                        @can('admin.users.roles.edit')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/roles">
                                {{ __('menu.admin.roles_edit') }}
                            </a>
                        </li>
                        @endcan
                        --}}
                        @can('admin.rcon.edit_simple')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/rcon-edit-simple">
                                {{ __('menu.admin.rcon_edit_simple') }}
                            </a>
                        </li>
                        @endcan
                        @can('admin.logs')
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/admin/logs">
                                {{ __('menu.admin.logs') }}
                            </a>
                        </li>
                        @endcan
                    </ul>
                    @endcanany
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
@endsection
