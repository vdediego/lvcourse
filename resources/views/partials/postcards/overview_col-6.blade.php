<div class="row">
    <div class="col-6 offset-3">
        <a href="/pc/{{ $postcard->id }}"><img
                src="/storage/{{ $postcard->image()->getResults() ? $postcard->image()->getResults()['filename'] : 'no-photo.jpg' }}"
                class="w-100"></a>
    </div>
</div>
<div class="row pt-2 pb-4">
    <div class="col-6 offset-3">
        <p>
            <span class="font-weight-bold">By
                <a href="/profile/{{ $postcard->user->id }}">
                    <span class="text-dark">{{ $postcard->user->username }} </span>
                </a>{{ $postcard->description }}
            </span>
        </p>
    </div>
</div>
