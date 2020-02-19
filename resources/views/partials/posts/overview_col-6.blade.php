<div class="col-6">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
                <a href="/p/{{ $post->id }}"><img
                        src="/storage/{{ $post->image()->getResults() ? $post->image()->getResults()['filename'] : 'no-photo.jpg' }}"
                        class="w-100"></a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <p>
            <span class="font-weight-bold">By
                <a href="/profile/{{ $post->user->id }}">
                    <span class="text-dark">{{ $post->user->username }} </span>
                </a>{{ $post->caption }}
            </span>
                </p>
            </div>
        </div>
    @endforeach
</div>
