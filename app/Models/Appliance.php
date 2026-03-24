<?php

namespace App\Models;

class Appliance extends BaseModel
{
    protected $fillable = [
        'category',
        'brand',
        'model',
        'label',
        'serviced_at',
    ];
}
