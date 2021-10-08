@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header :name="__('frontend.admin.create')"></x-portal-header>

    @include('includes.crud-messages')

    <form action="/admin/players/store" method="post">
        @csrf

        <x-input name="username" :label="__('auth.fields.username')"></x-input>
        <x-input name="realname" :label="__('frontend.admin.fields.realname')"></x-input>
        <x-input name="email" type="email" :label="__('frontend.admin.fields.email')"></x-input>
        <x-input name="password" type="password" :label="__('auth.fields.password')"></x-input>

        <button type="submit" class="btn btn-primary">{{ __('frontend.save') }}</button>
    </form>

@endsection
