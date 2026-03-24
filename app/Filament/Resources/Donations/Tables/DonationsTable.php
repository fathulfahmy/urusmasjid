<?php

namespace App\Filament\Resources\Donations\Tables;

use App\Filament\Exports\DonationExporter;
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

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(DonationExporter::class),
            ])
            ->defaultSort('updated_at')
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('amount')
                    ->numeric()
                    ->formatStateUsing(fn ($state) => 'RM '.number_format($state / 100, 2))
                    ->money('MYR')
                    ->wrap()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('donator')
                    ->wrap()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('donated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                MediaColumn::make('attachments')
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
                    ->exporter(DonationExporter::class),
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
