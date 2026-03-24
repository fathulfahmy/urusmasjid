<?php

namespace App\Filament\Resources\Supplies\Pages;

use App\Filament\Resources\Supplies\SupplyResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSupply extends CreateRecord
{
    protected static string $resource = SupplyResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        if (app()->environment('demo')) {
            Notification::make()
                ->info()
                ->title('Live Demo')
                ->body('Changes will not be saved')
                ->send();

            return new ($this->getModel())($data);
        }

        return static::getModel()::create($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
