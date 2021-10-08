
@if(session('message'))
    <p class="alert alert-info">
        {{ session('message') }}
    </p>
@endif

@if($errors->any())
    <div class="alert alert-danger text-start">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
