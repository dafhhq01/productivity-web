<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'amount_invested', 'annual_rate', 'start_date'])]
class Investment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
