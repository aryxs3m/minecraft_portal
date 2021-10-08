@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header :name="__('frontend.admin.create')"></x-portal-header>

    @include('includes.crud-messages')

    <form action="/admin/rcon-edit-simple/store" method="post">
        @csrf

        <x-input name="value" :label="__('frontend.admin.fields.command')"></x-input>

        <button type="submit" class="btn btn-primary">{{ __('frontend.save') }}</button>
    </form>

@endsection
