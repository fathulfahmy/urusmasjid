<?php

namespace App\Filament\Exports;

use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class ActivityLogExporter extends Exporter
{
    protected static ?string $model = Activity::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('Log ID'),
            ExportColumn::make('causer_type')
                ->label('Causer')
                ->formatStateUsing(fn ($state) => Str::of(class_basename($state))->replaceMatches('/([a-z0-9])([A-Z])/', '$1 $2')->title()),
            ExportColumn::make('causer_id')
                ->label('Causer ID'),
            ExportColumn::make('subject_type')
                ->label('Subject')
                ->formatStateUsing(fn ($state) => Str::of(class_basename($state))->replaceMatches('/([a-z0-9])([A-Z])/', '$1 $2')->title()),
            ExportColumn::make('subject_id')
                ->label('Subject ID'),
            ExportColumn::make('description'),
            ExportColumn::make('properties')
                ->formatStateUsing(function ($state) {
                    return collect($state['attributes'] ?? $state)
                        ->map(function ($value, $key) {
                            $k = str($key)
                                ->replace('_', ' ')
                                ->title()
                                ->replace('Id', 'ID')
                                ->toString();
                            $v = is_array($value) ? json_encode($value) : $value;

                            return "- {$k}: {$v}";
                        })
                        ->implode("\n");
                }),
            ExportColumn::make('created_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your activity log export has completed and '.Number::format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
