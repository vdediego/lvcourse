@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($posts) == 0 && count($postcards) == 0)
            <div class="row">
                <h1 class="w-100"><strong> You are not following anybody!</strong></h1>
                <h2 class="w-100"><em>Do not expect to see anything.</em></h2>
            </div>
        @endif

        <div class="row">
            <div class="col-6 d-flex align-items-center mb-2">
                <h1>Posts</h1>
                <a class="btn btn-primary w-20 ml-4 mb-2" href="p/create">Add</a>
            </div>
            <div class="col-6 d-flex align-items-center">
                <h1>Postcards</h1>
                <a class="btn btn-primary w-20 ml-4 mb-2" href="pc/create">Add</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                @each('partials.listing.element', $posts, 'data')
            </div>
            <div class="col-6">
                @each('partials.listing.element', $postcards, 'data')
            </div>
        </div>
        @include('partials.listing.pagination', ['post' => $posts, 'postcard' => $postcards])
    </div>
@endsection
