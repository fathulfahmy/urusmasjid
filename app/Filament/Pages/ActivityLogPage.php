<?php

namespace App\Filament\Pages;

use App\Filament\Exports\ActivityLogExporter;
use BackedEnum;
use Filament\Actions\ExportAction;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ActivityLogPage extends Page implements HasTable
{
    use InteractsWithTable;

    protected string $view = 'filament.pages.activity-log-page';

    protected static ?string $title = 'Log';

    protected static ?string $navigationLabel = 'Log';

    protected static ?string $slug = 'log';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxStack;

    protected static string|UnitEnum|null $navigationGroup = 'Others';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->query(Activity::query())
            ->headerActions([
                ExportAction::make()
                    ->exporter(ActivityLogExporter::class),
            ])
            ->defaultSort('created_at')
            ->columns([
                TextColumn::make('id')
                    ->label('Log ID')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('causer_type')
                    ->label('Causer')
                    ->wrap()
                    ->formatStateUsing(fn ($state) => Str::of(class_basename($state))->replaceMatches('/([a-z0-9])([A-Z])/', '$1 $2')->title())
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('causer_id')
                    ->label('Causer ID')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('subject_type')
                    ->label('Subject')
                    ->wrap()
                    ->formatStateUsing(fn ($state) => Str::of(class_basename($state))->replaceMatches('/([a-z0-9])([A-Z])/', '$1 $2')->title())
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('subject_id')
                    ->label('Subject ID')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('description')
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('properties')
                    ->state(function ($record): ?array {
                        return collect($record->properties['attributes'] ?? $record->properties)
                            ->map(function ($value, $key) {
                                $k = str($key)
                                    ->replace('_', ' ')
                                    ->title()
                                    ->replace('Id', 'ID')
                                    ->toString();
                                $v = is_array($value) ? json_encode($value) : $value;

                                return "$k: $v";
                            })
                            ->values()
                            ->toArray();
                    })
                    ->listWithLineBreaks()
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
