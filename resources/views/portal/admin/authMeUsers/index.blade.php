@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header name="{{ __('menu.admin.players') }}"></x-portal-header>

    <div class="mb-3 toolbar">
        @can('admin.players.create')
        <a href="/admin/players/create" class="btn btn-primary">{{ __('frontend.admin.create') }}</a>
        @endcan

        @can('admin.players.invite')
        <form action="/admin/players/invite" method="post">@csrf
            <button class="btn btn-success">{{ __('frontend.admin.players.invite') }}</button></form>
        @endcan
    </div>

    @include('includes.crud-messages')

    <table id="crudTable" class="table table-hover">
        <thead>
        <tr>
           <th>{{ __("frontend.crud_labels.id") }}</th>
           <th>{{ __("frontend.crud_labels.username") }}</th>
           <th>{{ __("frontend.crud_labels.email") }}</th>
           <th>{{ __("frontend.crud_labels.ip") }}</th>
           <th>{{ __("frontend.crud_labels.admin") }}</th>
           <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($authMeUsers as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->ip }}</td>
                <td>
                    @if($item->hasRole('admin'))
                        <span class="badge bg-success">Admin</span>
                    @endif
                </td>
                <td class="text-end">
                    @can('admin.players.modify')
                    <a href="/admin/players/edit/{{ $item->id }}" class="btn btn-primary btn-sm">{{ __('frontend.admin.edit') }}</a>
                    @endcan
                    @can('admin.users.manage_roles')
                    <a href="/admin/players/edit-roles/{{ $item->id }}" class="btn btn-warning btn-sm">{{ __('frontend.admin.edit-roles') }}</a>
                    @endcan
                    @can('admin.players.delete')
                    <form action="/admin/players/destroy/{{ $item->id }}" method="post">@csrf
                        <button class="btn btn-danger btn-sm">{{ __('frontend.admin.delete') }}</button></form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
