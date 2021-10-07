@extends('layouts.auth')

@section('content')
<main class="form-signin text-center">
    <form method="post" action="/login">
        @csrf

        <h1 class="mb-3 fw-normal">Totoro MC</h1>
        <h5 class="h5 mb-3 fw-normal">Jelentkezz be!</h5>

        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <p class="alert alert-danger text-start">
                {{ session('error') }}
            </p>
        @endif

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Felhasználó" name="username">
            <label for="floatingInput">Felhasználó</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Jelszó" name="password">
            <label for="floatingPassword">Jelszó</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Belépés</button>
        <p class="mt-5 mb-3 text-muted">Totoro MC &mdash; {{ Date('Y') }}</p>
    </form>
</main>
@endsection
