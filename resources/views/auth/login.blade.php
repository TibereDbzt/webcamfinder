@extends("app")


@push('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('title', 'Home')

@section('content')
    <h1 class="baseline">Login to WebcamAPI <br>and save your favorite webcams!</h1>
<div class="register">
    <form action="{{ route('login') }}"  method="POST">
        @csrf
        <label for="name" class="">{{ __('Username') }}</label>
        <input id="username" class="username_input" type="text" @error('username') is-invalid @enderror" name="username"
            value="{{ old('username') }}" required autocomplete="username" autofocus>
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="password" class="">{{ __('Password') }}</label>
        <input id="password" class="password_input" type="password" name="password" @error('password') is-invalid
            @enderror" name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="submit">
            {{ __('Login') }}
        </button>
    </form>
</div>
@endsection
