@extends("app")

@push('metas')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/favorites.css') }}">
@endpush

@section('title', 'Favorites')

@section('content')
    <div class="result">
        <h1>You have {{ $total }} webcams in favorites</h1>
    </div>
    @foreach ($favorites as $favorite)
        <div class="webcam">
            <a href="{{route("getCam", $favorite->id)}}">
                <h1>{{$favorite->title}}</h1>
                <img src="{{ $favorite->image->current->preview }}">
            </a>
            <div class="background"></div>
        </div>
    @endforeach
@endsection
