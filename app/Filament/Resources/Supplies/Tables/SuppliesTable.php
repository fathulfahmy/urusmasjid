<?php

namespace App\Filament\Resources\Supplies\Tables;

use App\Filament\Exports\SupplyExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ExportBulkAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class SuppliesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(SupplyExporter::class),
            ])
            ->defaultSort('updated_at')
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('quantity')
                    ->numeric()
                    ->wrap()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('unit')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                ExportBulkAction::make()
                    ->exporter(SupplyExporter::class),
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->action(function (Collection $records) {
                            if (app()->environment('demo')) {
                                return Notification::make()
                                    ->info()
                                    ->title('Live Demo')
                                    ->body('Changes will not be saved')
                                    ->send();
                            }

                            $records->each->delete();
                        }),
                    ForceDeleteBulkAction::make()
                        ->action(function (Collection $records) {
                            if (app()->environment('demo')) {
                                return Notification::make()
                                    ->info()
                                    ->title('Live Demo')
                                    ->body('Changes will not be saved')
                                    ->send();
                            }

                            $records->each->forceDelete();
                        }),
                    RestoreBulkAction::make()
                        ->action(function (Collection $records) {
                            if (app()->environment('demo')) {
                                return Notification::make()
                                    ->info()
                                    ->title('Live Demo')
                                    ->body('Changes will not be saved')
                                    ->send();
                            }

                            $records->each->restore();
                        }),
                ]),
            ]);
    }
}
