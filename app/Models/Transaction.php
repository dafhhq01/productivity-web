<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['type', 'category', 'amount', 'transaction_date', 'note'])]
class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
