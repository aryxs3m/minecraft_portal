@extends('layouts.auth')

@section('content')
<main class="form-signin text-center">

    <h1 class="mb-3 fw-normal">{{ config('app.name') }}</h1>
    <h5 class="h5 mb-3 fw-normal">{{ __('auth.registration') }}</h5>

    @if($invite)
    <form method="post" action="{{ url()->full() }}">
    @else
    <form method="post" action="/register">
    @endif
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <p class="alert alert-danger text-start">
                {{ session('error') }}
            </p>
        @endif

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputUsername" placeholder="{{ __('auth.fields.username') }}" name="username">
            <label for="floatingInputUsername">{{ __('auth.fields.username') }}</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="{{ __('auth.fields.realname') }}" name="realname">
            <label for="floatingInput">{{ __('auth.fields.realname') }}</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword1" placeholder="{{ __('auth.fields.password') }}" name="password">
            <label for="floatingPassword1">{{ __('auth.fields.password') }}</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="{{ __('auth.fields.password_again') }}" name="password_confirmation">
            <label for="floatingPassword">{{ __('auth.fields.password_again') }}</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('auth.register') }}</button>
        <p class="mt-5 mb-3 text-muted">{{ config('app.name') }} &mdash; {{ Date('Y') }}</p>
    </form>

</main>
@endsection
