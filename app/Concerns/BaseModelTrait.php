<?php

namespace App\Concerns;

use Database\Factories\SupplyFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait BaseModelTrait
{
    /** @use HasFactory<SupplyFactory> */
    use HasFactory, HasUuids, InteractsWithMedia, LogsActivity, SoftDeletes;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        if ($media && $media->mime_type == 'application/pdf') {
            $this
                ->addMediaConversion('pdf-thumb')
                ->width(368)
                ->height(232);
        }

    }
}
