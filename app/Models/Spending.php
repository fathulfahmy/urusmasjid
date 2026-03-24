<?php

namespace App\Models;

class Spending extends BaseModel
{
    protected $fillable = [
        'amount',
        'purpose',
        'spent_at',
    ];
}
