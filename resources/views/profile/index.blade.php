@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle logo-img">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                <h1>{{ $user->username }}</h1>

                @can('update', $user->profile)
                    <a href="/p/create">New Post</a>
                    <a href="/pc/create">New Postcard</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $postcardCount }}</strong> postcards</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description  }}</div>
            <div><a href="{{ $user->profile->url ?? '#' }}">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    @include('partials.posts.ownPosts', ['posts' => $user->posts])
    @include('partials.postcards.ownPostcards', ['postcards' => $user->postcards])

</div>
@endsection
