@extends("app")


@push('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('title', 'Home')

@section('content')
<h1 class="baseline">Register for WebcamAPI <br>and save your favorite webcams!</h1>
<div class="register">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name" class="">{{ __('Name') }}</label>
        <input id="name" class="username_input" type="text" @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="username" class="">{{ __('Username') }}</label>
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
        <label for="password-confirm"
            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" class="password_input" type="password" name="password_confirmation" required
            autocomplete="new-password">
        <button type="submit" class="submit">
            {{ __('Register') }}
        </button>
    </form>
</div>

{{--     <button class="to-search" onclick="window.location.href = '{{ url('/search') }}';">Find Webcams</button>
--}}@endsection
