<div class="row pt-4">
    @foreach($postcards as $postcard)
        <div class="col-4 pb-4">
            <a href="/pc/{{ $postcard->id }}">
                <img class="w-100" src="/storage/{{ $postcard->image()->getResults()['filename'] }}" alt="">
            </a>
        </div>
    @endforeach
</div>
