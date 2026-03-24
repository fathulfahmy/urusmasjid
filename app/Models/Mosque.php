<?php

namespace App\Models;

class Mosque extends BaseModel
{
    protected $fillable = [
        'name',
        'address',
        'timezone',
        'method',
        'school',
        'tune',
        'adhan_duration',
        'prayer_duration',
    ];
}
