@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header name="{{ __('menu.admin.rcon_edit_simple') }}"></x-portal-header>

    <a href="/admin/rcon-edit-simple/create" class="btn btn-primary mb-3">{{ __('frontend.admin.create') }}</a>

    @include('includes.crud-messages')

    <table id="crudTable" class="table table-hover">
        <thead>
        <tr>
           <th>{{ __("frontend.crud_labels.id") }}</th>
           <th>{{ __("frontend.crud_labels.value") }}</th>
           <th>{{ __("frontend.crud_labels.created_at") }}</th>
           <th>{{ __("frontend.crud_labels.updated_at") }}</th>
           <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($simpleRCONElements as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td class="text-end">
                    <a href="/admin/rcon-edit-simple/edit/{{ $item->id }}" class="btn btn-primary btn-sm">{{ __('frontend.admin.edit') }}</a>
                    <form action="/admin/rcon-edit-simple/destroy/{{ $item->id }}" method="post">@csrf
                        <button class="btn btn-danger btn-sm">{{ __('frontend.admin.delete') }}</button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
