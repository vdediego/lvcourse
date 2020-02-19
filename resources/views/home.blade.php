@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($posts) == 0 && count($postcards) == 0)
            <div class="row justify-content-between">
                <h1 class="w-100"><strong> You are not following anybody with relevant published content!</strong></h1>
                <h2 class="w-100"><em>Do not expect to see anything.</em></h2>

                <div class="pt-4">
                    <a class="btn btn-primary w-20 ml-4 mb-2" href="p/create">Add new post</a>
                    <a class="btn btn-primary w-20 ml-4 mb-2" href="pc/create">Add new postcard</a>
                </div>

            </div>
        @else
            <div class="row d-flex">
                // @TODO: list of all profiles
            </div>
            <div class="row d-flex">
                <div class="col-6 mb-2 align-content-around">
                    <h1>Interesting posts</h1>
                    <a class="btn btn-primary w-20 ml-4 mb-2" href="p/create">Add</a>
                </div>
                <div class="col-6 mb-2">
                    <h1>And ... postcards</h1>
                    <a class="btn btn-primary w-20 ml-4 mb-2" href="pc/create">Add</a>
                </div>
            </div>
            <div class="row">
                @include('partials.posts.overview_col-6')
                @include('partials.postcards.overview_col-6')
            </div>
            @include('partials.listing.pagination', ['post' => $posts, 'postcard' => $postcards])
        @endif
    </div>
@endsection
