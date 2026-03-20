<?php

namespace App\Filament\Resources\Spendings\Pages;

use App\Filament\Resources\Spendings\SpendingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSpending extends ViewRecord
{
    protected static string $resource = SpendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
