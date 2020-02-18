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
        <div class="col-6 d-flex align-items-center">
            <h1>Posts</h1>
            <a class="btn btn-primary m-5" href="p/create">Add</a>
        </div>
        <div class="col-6 d-flex align-items-center">
            <h1>Postcards</h1>
            <a class="btn btn-primary m-5" href="pc/create">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-6 offset-3">
                        <a href="/profile/{{ $post->user->id }}"><img src="/storage/{{ $post->image()->getResults() ? $post->image()->getResults()['filename'] : 'no-photo.jpg' }}" class="w-100"></a>
                    </div>
                </div>
                <div class="row pt-2 pb-4">
                    <div class="col-6 offset-3">
                        <div>
                            <p>
                            <span class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }} </span>
                                </a>
                            </span>{{ $post->caption }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        <div class="col-6">
            @foreach($postcards as $postcard)
                <div class="row">
                    <div class="col-6 offset-3">
                        <a href="/profile/{{ $postcard->user->id }}"><img src="/storage/{{ $postcard->image()->getResults() ? $postcard->image()->getResults()['filename'] : 'no-photo.jpg' }}" class="w-100"></a>
                    </div>
                </div>
                <div class="row pt-2 pb-4">
                    <div class="col-6 offset-3">
                        <div>
                            <p>
                            <span class="font-weight-bold">
                                <a href="/profile/{{ $postcard->user->id }}">
                                    <span class="text-dark">{{ $postcard->user->username }} </span>
                                </a>
                            </span>{{ $postcard->body }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
