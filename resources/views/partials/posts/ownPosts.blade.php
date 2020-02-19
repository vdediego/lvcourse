<div class="row pt-4">
    @foreach($posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img class="w-100" src="/storage/{{ $post->image()->getResults()['filename'] }}" alt="">
            </a>
        </div>
    @endforeach
</div>
