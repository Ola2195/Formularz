@extends('layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
    .fm {
        margin: 5px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Log in
    </div>
    <div class="card-body">
        @if (session('status')) 
            <div class="alert alert-succes" role="alert">
                {{ sesion('status') }}
            </div>
        @elseif (session('failed')) 
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>
        @endif

        <form method="POST" action="{{ url('login') }}" class="needs-validation">
            @csrf

            <div class="form-group row">
                <label for="login" class="col-md-4 col-form-label text-md-right fm">Login</label>
                <div class="col-md-6">
                    <input id="login" type="login" class=" fm form-control @error('login') is-invalid @enderror" name="login" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right fm">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="fm form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
@endsection