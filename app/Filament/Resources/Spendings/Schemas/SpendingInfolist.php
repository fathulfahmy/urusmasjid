<?php

namespace App\Filament\Resources\Spendings\Schemas;

use App\Filament\Infolists\Components\MediaEntry;
use App\Models\Spending;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpendingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->inlineLabel()->schema([
                    TextEntry::make('amount')
                        ->numeric()
                        ->money('MYR')
                        ->formatStateUsing(fn($state) => 'RM ' . number_format($state / 100, 2)),
                    TextEntry::make('purpose'),
                    TextEntry::make('spent_at')->dateTime(),
                    MediaEntry::make('attachments'),
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
                        ->visible(fn(Spending $record): bool => $record->trashed()),
                ]),
            ]);
    }
}
