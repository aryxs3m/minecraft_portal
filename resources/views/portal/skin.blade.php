@extends('layouts.portal')

@push('head')
    <link rel="stylesheet" href="/assets/styles/minecraft-skinviewer.css">
@endpush

@section('content')
    <x-portal-header name="{{ __('menu.skinchange') }}"></x-portal-header>

    @if(session('error'))
        <p class="alert alert-danger mb-3">
            {{ session('error') }}
        </p>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <div class="card-title">
                <h5>{{ __('frontend.skinchange.current_skin') }}</h5>
            </div>

            @if($skinType == 'slim')
                <x-skin-viewer :skin="$skinUrl"></x-skin-viewer>
            @else
                <x-skin-viewer :skin="$skinUrl" legacy></x-skin-viewer>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h5>{{ __('frontend.skinchange.upload_new_skin') }}</h5>
            </div>

            <form action="/skin" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-2 mb-3">
                        <div class="btn-group" role="group" aria-label="Skin típus">
                            <input type="radio" class="btn-check" name="skin_type" id="skinType1" autocomplete="off" value="1" checked>
                            <label class="btn btn-outline-primary" for="skinType1">{{ __('frontend.skinchange.standard') }}</label>

                            <input type="radio" class="btn-check" name="skin_type" id="skinType2" value="2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="skinType2">{{ __('frontend.skinchange.slim') }}</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <input class="form-control" type="file" name="skin_file">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('frontend.upload') }}</button>

            </form>

        </div>
    </div>
@endsection
