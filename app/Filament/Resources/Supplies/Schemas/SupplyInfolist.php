<?php

namespace App\Filament\Resources\Supplies\Schemas;

use App\Models\Supply;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SupplyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->inlineLabel()->schema([
                    TextEntry::make('name'),
                    TextEntry::make('quantity')
                        ->numeric(),
                    TextEntry::make('unit'),
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
                        ->visible(fn(Supply $record): bool => $record->trashed()),
                ])
            ]);
    }
}
