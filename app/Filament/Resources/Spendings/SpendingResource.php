<?php

namespace App\Filament\Resources\Spendings;

use App\Filament\Resources\Spendings\Pages\CreateSpending;
use App\Filament\Resources\Spendings\Pages\EditSpending;
use App\Filament\Resources\Spendings\Pages\ListSpendings;
use App\Filament\Resources\Spendings\Pages\ViewSpending;
use App\Filament\Resources\Spendings\Schemas\SpendingForm;
use App\Filament\Resources\Spendings\Schemas\SpendingInfolist;
use App\Filament\Resources\Spendings\Tables\SpendingsTable;
use App\Models\Spending;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SpendingResource extends Resource
{
    protected static ?string $model = Spending::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;

    protected static string|UnitEnum|null $navigationGroup = 'Finance';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return SpendingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SpendingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpendingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSpendings::route('/'),
            'create' => CreateSpending::route('/create'),
            'view' => ViewSpending::route('/{record}'),
            'edit' => EditSpending::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
