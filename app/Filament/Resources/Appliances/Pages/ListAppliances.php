<?php

namespace App\Filament\Resources\Appliances\Pages;

use App\Filament\Resources\Appliances\ApplianceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAppliances extends ListRecords
{
    protected static string $resource = ApplianceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
