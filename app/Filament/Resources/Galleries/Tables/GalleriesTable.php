<?php

namespace App\Filament\Resources\Galleries\Tables;

use App\Filament\Exports\GalleryExporter;
use App\Filament\Tables\Columns\MediaColumn;
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

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(GalleryExporter::class),
            ])
            ->reorderable('order_column')
            ->afterReordering(function (array $order): void {
                Notification::make()
                    ->success()
                    ->title('Saved')
                    ->send();
            })
            ->defaultSort('order_column')
            ->columns([
                TextColumn::make('order_column')
                    ->label('Order')
                    ->toggleable(),
                TextColumn::make('id')
                    ->label('ID')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                MediaColumn::make('media')
                    ->toggleable(),
                TextColumn::make('duration')
                    ->numeric()
                    ->wrap()
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
                    ->exporter(GalleryExporter::class),
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
