@extends("app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('title', 'Home')

@section('content')
    @auth
        <p class="hello">Hello {{ Auth::user()->name }}.</p>
    @endauth
    <h1 class="baseline">Find webcams around the world.</h1>
    <button class="to-search" onclick="window.location.href = '{{ url('/search') }}';">Find Webcams</button>
@endsection