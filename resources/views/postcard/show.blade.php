@extends('layouts.app')

@section('content')
    <div class="postcard-front">
        <div class="pc-container">
            <div class="pc-body">
                <div id="card">
                    <div id="safe-area">
                        <div class="row">
                            {{ $postcard->recipient_name }}
                        </div>
                        <div class="row">
                            {{ $postcard->recipient_address }}
                        </div>
                        <div class="row">
                            {{ $postcard->body }}
                            <a href="/storage/{{ $postcard->image()->getResults()['filename'] }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
