@extends("app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/result.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/displayResult.js') }}"></script>
@endpush

@section('title', 'Result')

@section('content')
    <div class="result">
      <h1>{{ $number }} webcams found in <span></span></h1>
    </div>
    @foreach ($webcams as $webcam)
        <div class="webcam">
            <a href="{{route("getCam", $webcam->id)}}">
                <h1>{{$webcam->title}}</h1>
                <img src="{{ $webcam->image->current->preview }}">
            </a>
            <div class="background"></div>
        </div>
    @endforeach
@endsection