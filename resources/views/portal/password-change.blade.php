@extends('layouts.portal')

@section('content')
    <x-portal-header name="{{ __('menu.passwordchange') }}"></x-portal-header>

    @if ($errors->any())
        <div class="alert alert-danger text-start">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <p class="alert alert-success mb-3">
            {{ __('frontend.passwordchange.successful') }}
        </p>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <form action="/password-change" method="post">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{ __('frontend.passwordchange.new_password') }}</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">{{ __('frontend.passwordchange.new_password_again') }}</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-primary">{{ __('frontend.save') }}</button>
            </form>
        </div>
    </div>
@endsection
