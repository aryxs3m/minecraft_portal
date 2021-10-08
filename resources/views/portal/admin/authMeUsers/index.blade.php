@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header name="{{ __('menu.admin.players') }}"></x-portal-header>

    <a href="/admin/players/create" class="btn btn-primary mb-3">{{ __('frontend.admin.create') }}</a>

    @include('includes.crud-messages')

    <table id="crudTable" class="table table-hover">
        <thead>
        <tr>
           <th>id</th>
           <th>username</th>
           <th>email</th>
           <th>ip</th>
           <th>admin</th>
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
                    <a href="/admin/players/edit/{{ $item->id }}" class="btn btn-primary btn-sm">{{ __('frontend.admin.edit') }}</a>
                    <form action="/admin/players/destroy/{{ $item->id }}" method="post">@csrf
                        <button class="btn btn-danger btn-sm">{{ __('frontend.admin.delete') }}</button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
