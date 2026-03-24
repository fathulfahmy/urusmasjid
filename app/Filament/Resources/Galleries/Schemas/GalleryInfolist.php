<?php

namespace App\Filament\Resources\Galleries\Schemas;

use App\Filament\Infolists\Components\MediaEntry;
use App\Models\Gallery;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->inlineLabel()->schema([
                    TextEntry::make('id')->label('ID'),
                    MediaEntry::make('media'),
                    TextEntry::make('duration')
                        ->numeric(),
                ]),
                Section::make()->inlineLabel()->schema([
                    TextEntry::make('created_at')
                        ->dateTime()
                        ->placeholder('-'),
                    TextEntry::make('updated_at')
                        ->dateTime()
                        ->placeholder('-'),
                    TextEntry::make('deleted_at')
                        ->dateTime()
                        ->visible(fn (Gallery $record): bool => $record->trashed()),
                ]),
            ]);
    }
}
