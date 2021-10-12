@extends('layouts.portal')

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // === include 'setup' then 'config' above ===

        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };


        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endpush

@section('content')
    <x-portal-header name="{{ __('menu.admin.monitoring') }}"></x-portal-header>

    <div class="card mb-3">
        <div class="card-body">
            <div class="card-title">
                <h5 class="m-0">{{ __('frontend.admin.simple_rcon.commands') }}</h5>
            </div>
            <canvas id="myChart"></canvas>
        </div>
    </div>

@endsection
