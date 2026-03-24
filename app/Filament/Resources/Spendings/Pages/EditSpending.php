<?php

namespace App\Filament\Resources\Spendings\Pages;

use App\Filament\Resources\Spendings\SpendingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSpending extends EditRecord
{
    protected static string $resource = SpendingResource::class;

    protected static ?string $title = 'Edit Spending';

    protected ?string $heading = '';

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()
                ->action(function (Model $record) {
                    if (app()->environment('demo')) {
                        return Notification::make()
                            ->info()
                            ->title('Live Demo')
                            ->body('Changes will not be saved')
                            ->send();
                    }

                    $record->delete();
                }),
            ForceDeleteAction::make()
                ->action(function (Model $record) {
                    if (app()->environment('demo')) {
                        return Notification::make()
                            ->info()
                            ->title('Live Demo')
                            ->body('Changes will not be saved')
                            ->send();
                    }

                    $record->forceDelete();
                }),
            RestoreAction::make()
                ->action(function (Model $record) {
                    if (app()->environment('demo')) {
                        return Notification::make()
                            ->info()
                            ->title('Live Demo')
                            ->body('Changes will not be saved')
                            ->send();
                    }

                    $record->restore();
                }),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (app()->environment('demo')) {
            $record->fill($data);
            Notification::make()
                ->info()
                ->title('Live Demo')
                ->body('Changes will not be saved')
                ->send();

            return $record;
        }

        $record->update($data);

        return $record;
    }
}
