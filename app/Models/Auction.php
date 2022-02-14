<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Auction extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 'opened',
        'title' => 'Новый аукцион'
    ];


    protected $fillable = [
        'title',
        'product_id',
        'count',
        'description',
        'status',
        'purchaser_id'
    ];

    public function bets(): HasMany
    {
        return $this->hasMany(Bet::class)
            ->orderBy('created_at', 'desc');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function leader(): HasOne
    {
        return $this->hasOne(Leader::class)
            ->latest();
    }
}
