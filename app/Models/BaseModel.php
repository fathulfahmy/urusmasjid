<?php

namespace App\Models;

use App\Concerns\BaseModelTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class BaseModel extends Model implements HasMedia
{
    use BaseModelTrait;
}
