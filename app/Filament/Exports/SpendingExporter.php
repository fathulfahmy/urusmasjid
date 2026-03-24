<?php

namespace App\Filament\Exports;

use App\Models\Spending;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class SpendingExporter extends Exporter
{
    protected static ?string $model = Spending::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('amount'),
            ExportColumn::make('purpose'),
            ExportColumn::make('spent_at'),
            ExportColumn::make('attachments')
                ->getStateUsing(
                    fn (Model $record) => $record->getMedia('default')
                        ->map(fn ($media) => $media->getUrl())
                        ->implode(', ')
                ),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('deleted_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your spending export has completed and '.Number::format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
