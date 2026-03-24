<?php

namespace App\Filament\Resources\Galleries\Pages;

use App\Filament\Resources\Galleries\GalleryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGallery extends ViewRecord
{
    protected static string $resource = GalleryResource::class;

    protected static ?string $title = 'View Gallery';

    protected ?string $heading = '';

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
