<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
