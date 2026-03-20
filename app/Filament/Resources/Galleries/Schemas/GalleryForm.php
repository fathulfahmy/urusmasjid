<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    SpatieMediaLibraryFileUpload::make('media')
                        ->disk('media')
                        ->required(),
                ]),
                Section::make([
                    TextInput::make('duration')
                        ->suffix('second')
                        ->numeric()
                        ->integer()
                        ->minValue(0)
                        ->default(10)
                        ->required(),
                ]),
            ]);
    }
}
