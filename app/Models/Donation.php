<?php

namespace App\Models;

class Donation extends BaseModel
{
    protected $fillable = [
        "amount",
        "donator",
        "donated_at",
    ];
}
