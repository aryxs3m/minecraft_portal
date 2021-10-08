@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header :name="__('frontend.admin.edit_rcon_command')"></x-portal-header>

    @include('includes.crud-messages')

    <form action="/admin/rcon-edit-simple/update/{{ $simpleRCONElement->id }}" method="post">
        @csrf

        <x-input name="value" :label="__('frontend.admin.fields.command')" :valueFrom="$simpleRCONElement"></x-input>

        <button type="submit" class="btn btn-primary">{{ __('frontend.save') }}</button>
    </form>

@endsection
