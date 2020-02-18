<div class="row">
    <div class="col-12 d-flex justify-content-center">
        @if ($postcards->count() > $posts->count())
            {{ $postcards->links() }}
        @else
            {{ $posts->links() }}
        @endif

    </div>
</div>
