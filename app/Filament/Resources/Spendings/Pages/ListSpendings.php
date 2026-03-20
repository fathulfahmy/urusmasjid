<?php

namespace App\Filament\Resources\Spendings\Pages;

use App\Filament\Resources\Spendings\SpendingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpendings extends ListRecords
{
    protected static string $resource = SpendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
