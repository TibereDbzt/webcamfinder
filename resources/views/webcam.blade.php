@extends("app")

@push('metas')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/webcam.css') }}">
@endpush

@push('scripts')
    <script async type="text/javascript" src="https://webcams.windy.com/webcams/public/embed/script/player.js"></script>
@endpush

@section('title', 'Webcam')

@section('content')
    @foreach ($webcams as $webcam)
    @auth
<div class="favorite-container" data-camid="{{$webcam->id}}"  data-isfavorite="{{$is_favorite}}">
            <svg class="js-icon-favorite" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path class="star" d="m5.574 15.362-1.267 7.767c-.101.617.558 1.08 1.103.777l6.59-3.642 6.59 3.643c.54.3 1.205-.154 1.103-.777l-1.267-7.767 5.36-5.494c.425-.435.181-1.173-.423-1.265l-7.378-1.127-3.307-7.044c-.247-.526-1.11-.526-1.357 0l-3.306 7.043-7.378 1.127c-.606.093-.848.83-.423 1.265z"/></svg>
            <p class="js-text-favorite">Add to your favorites</p>
        </div>
    @endauth
        <div class="player-container">
            <a name="windy-webcam-timelapse-player" data-id="{{$webcam->id}}" data-play="day" href="{{$webcam->player->day->link}}" target="_blank">{{$webcam->title}}</a>
        </div>
    @endforeach
@endsection