<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'category',
        'amount',
        'year',
        'month',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
