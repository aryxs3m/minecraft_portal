@extends('layouts.portal')

@section('content')
    <x-portal-header name="Főoldal"></x-portal-header>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $serverInfo->motd }}</h5>
            <p class="card-text"><strong>{{ config('minecraft.server') }}:{{ config('minecraft.query_port') }}</strong></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                @if($serverInfo->online)
                    <span class="text-success">Online</span>
                @else
                    <span class="text-danger">Offline</span>
                @endif
            </li>
            <li class="list-group-item">{{ $serverInfo->version }}</li>
            <li class="list-group-item">{{ $serverInfo->players }} / {{ $serverInfo->max_players }} játékos</li>
            <li class="list-group-item">{{ $serverInfo->ping }} ms ping</li>
        </ul>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title mb-0">{{ $user->username }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                @if($user->isLogged)
                    <span class="text-success">Most játszik</span>
                @else
                    <span class="text-danger">Offline</span>
                @endif
            </li>
            <li class="list-group-item">Utolsó IP cím: <strong>{{ $user->ip }}</strong></li>
        </ul>
    </div>
@endsection
