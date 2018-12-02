<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'point',
    ];

    /*
     * -----------------------------------------------------------------------------------------------------------------
     * Relations
     * -----------------------------------------------------------------------------------------------------------------
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'partners_properties')->withTimestamps();
    }
}
