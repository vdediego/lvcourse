<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    // Disable mass assignment so we can validate in the controller
    protected $guarded = [];

    public function profileImage()
    {
        return ($this->image) ? '/storage/' . $this->image : 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSMhJ8h4mmN4WdShizpv5v5zte6rQd3MHLWcuwkn1urAi5H3f2a';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
