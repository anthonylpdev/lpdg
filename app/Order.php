<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_firstname', 'client_lastname', 'client_phone', 'delivery_at', 'user_id'];

    protected $casts = [
        'user_id' => 'integer',
    ];

    /**
     * The user that belong to the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The items that belong to the order.
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)
            ->using(ItemOrder::class)
            ->withPivot('quantity', 'comment')
            ->withTimestamps();
    }

    public function scopePublished(Builder $query)
    {
        $now = Carbon::now()->toDateTimeString();
        $query->where('delivery_at', '>=', $now);
    }

    public function scopeArchived(Builder $query)
    {
        $now = Carbon::now()->toDateTimeString();
        $query->where('delivery_at', '<', $now);
    }
}
