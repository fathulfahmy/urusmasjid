<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\DonationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDonation extends ViewRecord
{
    protected static string $resource = DonationResource::class;

    protected static ?string $title = 'View Donation';

    protected ?string $heading = '';

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
