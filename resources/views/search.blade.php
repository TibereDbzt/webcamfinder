@extends("app")

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endpush

@section('title', 'Search')

@section('content')
    <form class="searchCam" action="./result" method="get">
        <input class="country js-input-country" type="text" name="country" placeholder="Country's name" required>
        <select class="categorie" name="categories" required>
            <option value="" selected disabled hidden>Categorie</option>
            <option value="airport">Airport</option>
            <option value="area">Area</option>
            <option value="bay">Bay</option>
            <option value="beach">Beach</option>
            <option value="building">Building</option>
            <option value="camping">Camping</option>
            <option value="city">City</option>
            <option value="golf">golf</option>
            <option value="lake">Lake</option>
            <option value="mountain">mountain</option>
        </select>
        <input class="number" type="number" name="limit" min="1" placeholder="10" required>
        <input class="submit" type="submit" value="Search">
    </form>
@endsection