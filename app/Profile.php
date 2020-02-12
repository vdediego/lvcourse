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
        return '/storage/' . (($this->image) ? $this->image : 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.teepublic.com%2Fes-mx%2Fbolsa-de-tela%2F3309274-im-not-available-sorry&psig=AOvVaw38AqvjBeRR5eH5W08K7ZZE&ust=1581601834084000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCMi5-42UzOcCFQAAAAAdAAAAABAc');
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
