<?php

namespace App\Filament\Resources\Appliances\Schemas;

use App\Models\Appliance;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplianceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->inlineLabel()->schema([
                    TextEntry::make('id')->label('ID'),
                    TextEntry::make('brand'),
                    TextEntry::make('model'),
                    TextEntry::make('label'),
                    TextEntry::make('category'),
                    TextEntry::make('serviced_at')
                        ->dateTime(),
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
                        ->visible(fn (Appliance $record): bool => $record->trashed()),
                ]),
            ]);
    }
}
