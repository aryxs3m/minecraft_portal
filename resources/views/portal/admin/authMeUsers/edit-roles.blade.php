@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header :name="$authMeUser->username"></x-portal-header>

    @include('includes.crud-messages')

    <form action="/admin/players/update-roles/{{ $authMeUser->id }}" method="post">
        @csrf

        <h4>{{ __('frontend.admin.roles') }}</h4>
        @foreach($roles as $role)
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="roleCheckbox_{{ $role->id }}" name="role_{{ $role->name }}" value="{{ $role->name }}" @if(in_array($role->name, $userRoles)) checked @endif>
                <label class="form-check-label" for="roleCheckbox_{{ $role->id }}">{{ $role->name }}</label>
            </div>
        @endforeach

        <h4 class="mt-4">{{ __('frontend.admin.permissions') }}</h4>
        @foreach($permissions as $permission)
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="permissionCheckbox_{{ $permission->id }}" name="permission_{{ $permission->name }}" value="{{ $permission->name }}" @if(in_array($permission->name, $userPermissions)) checked @endif>
                <label class="form-check-label" for="permissionCheckbox_{{ $permission->id }}">{{ __("permissions." . $permission->name) }}</label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">{{ __('frontend.save') }}</button>
    </form>

@endsection
