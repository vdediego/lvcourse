<div class="row">
    <div class="col-6 offset-3">
        <a href="/profile/{{ $data->user->id }}"><img
                src="/storage/{{ $data->image()->getResults() ? $data->image()->getResults()['filename'] : 'no-photo.jpg' }}"
                class="w-100"></a>
    </div>
</div>
<div class="row pt-2 pb-4">
    <div class="col-6 offset-3">
        <p>
            <span class="font-weight-bold">By
                <a href="/profile/{{ $data->user->id }}">
                    <span class="text-dark">{{ $data->user->username }} </span>
                </a>
            </span>
        </p>
    </div>
</div>
