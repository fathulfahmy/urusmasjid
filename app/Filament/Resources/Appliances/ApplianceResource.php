<?php

namespace App\Filament\Resources\Appliances;

use App\Filament\Resources\Appliances\Pages\CreateAppliance;
use App\Filament\Resources\Appliances\Pages\EditAppliance;
use App\Filament\Resources\Appliances\Pages\ListAppliances;
use App\Filament\Resources\Appliances\Pages\ViewAppliance;
use App\Filament\Resources\Appliances\Schemas\ApplianceForm;
use App\Filament\Resources\Appliances\Schemas\ApplianceInfolist;
use App\Filament\Resources\Appliances\Tables\AppliancesTable;
use App\Models\Appliance;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class ApplianceResource extends Resource
{
    protected static ?string $model = Appliance::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTv;

    protected static string|UnitEnum|null $navigationGroup = 'Inventory';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'id';

    public static function getGloballySearchableAttributes(): array
    {
        return ['category', 'brand', 'model', 'label'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->category,
            'Brand' => $record->brand,
            'Model' => $record->model,
            'Serial Number' => $record->label,
            'Serviced at' => $record->serviced_at,
        ];
    }

    public static function form(Schema $schema): Schema
    {
        return ApplianceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ApplianceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AppliancesTable::configure($table);
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
            'index' => ListAppliances::route('/'),
            'create' => CreateAppliance::route('/create'),
            'view' => ViewAppliance::route('/{record}'),
            'edit' => EditAppliance::route('/{record}/edit'),
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
