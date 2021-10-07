@extends('layouts.html')

@push('head')
    <link href="/assets/styles/dashboard.css" rel="stylesheet">
@endpush

@section('body')
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/home">Totoro MC</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="/logout">Kijelentkezés</a>
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
                                Főoldal
                            </a>
                            <a class="nav-link" aria-current="page" href="/skin">
                                Skincsere
                            </a>
                            <a class="nav-link" aria-current="page" href="/password-change">
                                Jelszócsere
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Linkek</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="https://minecraft.net">Minecraft.net</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://optifine.net">Optifine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.johnsmithlegacy.co.uk">John Smith Legacy</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
@endsection
