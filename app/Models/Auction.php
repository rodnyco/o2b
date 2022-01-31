<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
