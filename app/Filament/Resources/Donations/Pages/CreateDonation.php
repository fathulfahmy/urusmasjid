<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\DonationResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateDonation extends CreateRecord
{
    protected static string $resource = DonationResource::class;

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
