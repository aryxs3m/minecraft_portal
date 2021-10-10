@extends('layouts.portal')

@include('includes.crud-scripts')

@section('content')
    <x-portal-header name="{{ __('menu.admin.logs') }}"></x-portal-header>

    <table id="crudTable" class="table table-hover">
        <thead>
        <tr>
           <th>datetime</th>
           <th>log</th>
           <th>user</th>
           <th>model</th>
           <th>description</th>
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
