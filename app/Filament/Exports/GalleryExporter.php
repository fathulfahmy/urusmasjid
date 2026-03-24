<?php

namespace App\Filament\Exports;

use App\Models\Gallery;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class GalleryExporter extends Exporter
{
    protected static ?string $model = Gallery::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('media')
                ->getStateUsing(
                    fn (Model $record) => $record->getMedia('default')
                        ->map(fn ($media) => $media->getUrl())
                        ->implode(', ')
                ),
            ExportColumn::make('duration'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('deleted_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your gallery export has completed and '.Number::format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
