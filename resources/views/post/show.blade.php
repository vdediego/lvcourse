@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image()->getResults()['filename'] }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src=" {{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="{{ route('profile.show', $post->user_id) }}">
                                <span class="text-dark">{{ $post->user->name }}</span>
                            </a>
                            @if ($post->user_id !== auth()->user()->getAuthIdentifier())
                                <follow-button class="pt-2 mr-4"
                                               user-id="{{ $post->user_id }}"
                                               follows="{{ (auth()->user()) ? auth()->user()->following->contains($post->user_id) : false }}"></follow-button>
                            @endif
                        </div>
                    </div>
                </div>

                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="{{ route('profile.show', $post->user_id) }}">
                            <span class="text-dark">{{ $post->user->username }} </span>
                        </a>
                    </span>{{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
