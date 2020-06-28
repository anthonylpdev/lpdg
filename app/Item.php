<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'unit'];

    protected $casts = [
        'price' => 'float'
    ];

    /**
     * The orders that belong to the item.
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->using(ItemOrder::class)
            ->withPivot('quantity', 'comment')
            ->withTimestamps();
    }
}
