@extends('layouts.portal')

@section('content')
    <x-portal-header name="{{ __('menu.admin.rcon_simple') }}"></x-portal-header>


    @if(session('error'))
        <p class="alert alert-danger mb-3">
            {{ session('error') }}
        </p>
    @endif

    @if(session('success'))
        <p class="alert alert-success mb-3">
            {{ session('success') }}
        </p>
    @endif

    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="m-0">{{ __('frontend.admin.simple_rcon.commands') }}</h5>
                    </div>
                    <form action="/admin/rcon-simple/command" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <select class="form-select" name="command">
                                @foreach($commands as $command)
                                    <option value="{{ $command->id }}">{{ $command->value }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">{{ __('frontend.admin.send') }}</button>
                        </div>
                    </form>

                    @can('admin.rcon.edit_simple')
                        <a href="/admin/rcon-edit-simple">{{ __('frontend.admin.simple_rcon.manage_commands') }}</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="m-0">{{ __('frontend.admin.simple_rcon.kick') }}</h5>
                    </div>
                    <form action="/admin/rcon-simple/kick" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <select class="form-select" name="username">
                                @foreach($players as $player)
                                    <option value="{{ $player->username }}">{{ $player->username }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">{{ __('frontend.admin.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
