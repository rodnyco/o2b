<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leader extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_id',
        'bet_id',
    ];

    public function bet(): BelongsTo
    {
        return $this->belongsTo(Bet::class, 'bet_id');
    }
}
