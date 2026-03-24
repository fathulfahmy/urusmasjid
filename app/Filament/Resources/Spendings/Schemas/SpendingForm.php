<?php

namespace App\Filament\Resources\Spendings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Illuminate\Support\Carbon;

class SpendingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('amount')
                        ->prefix('RM')
                        ->numeric()
                        ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters([','])
                        ->formatStateUsing(fn ($state) => number_format($state / 100, 2, '.', ''))
                        ->dehydrateStateUsing(fn ($state) => (int) round($state * 100))
                        ->step(0.01)
                        ->required(),
                    TextInput::make('purpose')
                        ->placeholder('Toiletries')
                        ->required(),
                    DateTimePicker::make('spent_at')
                        ->default(Carbon::now())
                        ->required(),
                ]),
                Section::make([
                    SpatieMediaLibraryFileUpload::make('attachments')
                        ->multiple()
                        ->reorderable()
                        ->nullable(),
                ]),
            ]);
    }
}
