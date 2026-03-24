<?php

namespace App\Filament\Resources\Appliances\Pages;

use App\Filament\Resources\Appliances\ApplianceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAppliance extends ViewRecord
{
    protected static string $resource = ApplianceResource::class;

    protected static ?string $title = 'View Appliance';

    protected ?string $heading = '';

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
