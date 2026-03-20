<?php

namespace App\Filament\Resources\Appliances\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplianceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('brand')
                        ->placeholder('Daikin')
                        ->required(),
                    TextInput::make('model')
                        ->placeholder('Smarto FTKH-B (1.0 hp)')
                        ->required(),
                    TextInput::make('serial_number')
                        ->placeholder('FTKB25JV1/E027093')
                        ->required(),
                ]),
                Section::make([
                    TextInput::make('category')
                        ->placeholder('Air Conditioner')
                        ->required(),
                    DateTimePicker::make('serviced_at')
                        ->nullable(),
                ]),
            ]);
    }
}
