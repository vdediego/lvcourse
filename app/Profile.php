<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Disable mass assignment so we can validate in the controller
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
