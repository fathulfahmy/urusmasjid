<?php

namespace App\Models;

class Appliance extends BaseModel
{
    protected $fillable = [
        "category",
        "brand",
        "model",
        "serial_number",
        "serviced_at"
    ];
}
