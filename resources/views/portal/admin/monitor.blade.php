@extends('layouts.portal')

@push('script')
    <script src="{{ $tps_chart->cdn() }}"></script>
    {{ $tps_chart->script() }}
    {{ $ram_chart->script() }}
    {{ $ping_chart->script() }}
    {{ $players_chart->script() }}
@endpush

@section('content')
    <x-portal-header name="{{ __('menu.admin.monitoring') }}"></x-portal-header>

    @if($no_data)
        <p class="alert alert-warning">{{ __('frontend.admin.monitoring.warning_no_schedule') }}</p>
    @endif

    @if($tps_warning)
        <p class="alert alert-warning">{{ __('frontend.admin.monitoring.warning_tps') }}</p>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            {!! $tps_chart->container() !!}
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            {!! $ram_chart->container() !!}
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            {!! $ping_chart->container() !!}
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            {!! $players_chart->container() !!}
        </div>
    </div>

@endsection
