<?php

namespace App\Models;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Gallery extends BaseModel implements Sortable
{
    use SortableTrait;

    protected $fillable = [
        'duration',
        'order_column',
    ];

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];
}
