@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header :name="$authMeUser->username"></x-portal-header>

    @include('includes.crud-messages')

    <form action="/admin/players/update/{{ $authMeUser->id }}" method="post">
        @csrf

        <x-input name="username" :label="__('auth.fields.username')" :valueFrom="$authMeUser"></x-input>
        <x-input name="realname" :label="__('auth.fields.realname')" :valueFrom="$authMeUser"></x-input>
        <x-input name="email" type="email" :label="__('frontend.admin.fields.email')" :valueFrom="$authMeUser"></x-input>

        <button type="submit" class="btn btn-primary">{{ __('frontend.save') }}</button>
    </form>

@endsection
