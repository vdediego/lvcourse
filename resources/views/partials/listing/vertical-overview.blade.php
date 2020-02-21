<div class="row">
    <div class="col-6">
        @each('partials.posts.overview_col-6', $posts, 'post')
    </div>
    <div class="col-6">
        @each('partials.postcards.overview_col-6', $postcards, 'postcard')
    </div>
</div>
