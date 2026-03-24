<?php

namespace App\Filament\Resources\Supplies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SupplyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('name')
                        ->placeholder('Hand Wash')
                        ->required(),
                    TextInput::make('quantity')
                        ->numeric()
                        ->minValue(0)
                        ->default(0)
                        ->required(),
                    TextInput::make('unit')
                        ->placeholder('Pack')
                        ->required(),
                ]),
            ]);
    }
}
