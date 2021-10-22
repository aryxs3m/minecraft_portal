@extends('layouts.portal')

@push('head')
    @can('admin.rcon.expert')
    <link href="https://unpkg.com/jquery.terminal/css/jquery.terminal.min.css" rel="stylesheet"/>
    @endcan
@endpush

@push('script')
    @can('admin.rcon.expert')
    <script src="https://unpkg.com/jquery.terminal/js/jquery.terminal.min.js"></script>
    <script>
        jQuery(function($, undefined) {
            let term = $('#terminal').terminal(function(command) {
                let terminal = this;
                if (command !== '') {
                    $.ajax({
                        url: '/admin/rcon-terminal',
                        data: {
                            command: command
                        },
                        success: function(result){
                            terminal.echo('[[;lightgray;]' + String(result.message));
                        },
                        error: function (error){
                            console.log(error);
                            terminal.error(`${error.status} ${error.statusText} ${error.responseJSON.message}`);
                        }
                    })
                }
            }, {
                greetings: 'Remote RCON Terminal',
                name: 'rcon',
                height: 400,
                width: '100%',
                prompt: 'RCON> '
            });
        });
    </script>
    @endcan
@endpush

@section('content')
    <x-portal-header name="{{ __('menu.admin.rcon') }}"></x-portal-header>


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

    <div class="row row-cols-1 row-cols-md-2">
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

    @can('admin.rcon.expert')
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
                <h5 class="m-0">{{ __('frontend.admin.simple_rcon.terminal') }}</h5>
            </div>
            <div id="terminal"></div>
        </div>
    </div>
    @endcan


@endsection
