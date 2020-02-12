@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->profile->image }}" class="rounded-circle logo-img">
        </div>
        <div class="col-9 pt-5">
            @can('update', $user->profile)

                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="/p/create">New Post</a>
                </div>

                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts()->count() }}</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> views</div>
                <div class="pr-5"><strong>212</strong> followers</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description  }}</div>
            <div><a href="{{ $user->profile->url ?? '#' }}">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{ $post->image }}" alt="">
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection
