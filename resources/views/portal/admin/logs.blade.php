@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header name="{{ __('menu.admin.logs') }}"></x-portal-header>

    <table id="crudTable" class="table table-hover">
        <thead>
        <tr>
           <th>{{ __("frontend.crud_labels.datetime") }}</th>
           <th>{{ __("frontend.crud_labels.log") }}</th>
           <th>{{ __("frontend.crud_labels.user") }}</th>
           <th>{{ __("frontend.crud_labels.model") }}</th>
           <th>{{ __("frontend.crud_labels.description") }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $item)
            <tr>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->log_name }}</td>
                <td>
                    @if($item->causer_type == 'App\\Models\\AuthMeUser')
                        {{ $item->causer->username }}
                    @endif</td>
                <td>
                    @if($item->subject_type == 'App\\Models\\AuthMeUser')
                        {{ $item->subject->username }}
                    @endif
                    @if($item->subject_type == 'App\\Models\\SimpleRCONElement')
                        {{ $item->subject->value }}
                    @endif
                </td>
                <td>{{ $item->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
