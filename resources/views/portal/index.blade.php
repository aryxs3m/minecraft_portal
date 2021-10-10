@extends('layouts.portal')

@section('content')
    <x-portal-header name="{{ __('menu.home') }}"></x-portal-header>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $serverInfo->motd }}</h5>
            <p class="card-text"><strong>{{ config('minecraft.server') }}:{{ config('minecraft.query_port') }}</strong></p>
        </div>
        <ul class="list-group list-group-flush">
            @if($serverInfo->online)
            <li class="list-group-item"><span class="text-success">{{ __('frontend.home.online') }}</span></li>
            <li class="list-group-item">{{ $serverInfo->version }}</li>
            <li class="list-group-item">{{ $serverInfo->players }} / {{ $serverInfo->max_players }} {{ __('frontend.home.players') }}</li>
            <li class="list-group-item">{{ $serverInfo->ping }} ms {{ __('frontend.home.ping') }}</li>
            @else
            <li class="list-group-item"><span class="text-danger">{{ __('frontend.home.offline') }}</span></li>
            @endif
        </ul>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title mb-0">{{ $user->username }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                @if($user->isLogged)
                    <span class="text-success">{{ __('frontend.home.now_playing') }}</span>
                @else
                    <span class="text-danger">{{ __('frontend.home.offline') }}</span>
                @endif
            </li>
            <li class="list-group-item">{{ __('frontend.home.last_ip') }}: <strong>{{ $user->ip }}</strong></li>
        </ul>
    </div>
@endsection
