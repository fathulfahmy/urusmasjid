<?php

namespace App\Livewire;

use App\Models\Donation;
use App\Models\Spending;
use App\Models\Appliance;
use App\Models\Supply;
use App\Filament\Resources\Donations\Tables\DonationsTable;
use App\Filament\Resources\Spendings\Tables\SpendingsTable;
use App\Filament\Resources\Appliances\Tables\AppliancesTable;
use App\Filament\Resources\Supplies\Tables\SuppliesTable;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

new class extends Component implements HasActions, HasSchemas, HasTable {
    use InteractsWithActions;
    use InteractsWithSchemas;
    use InteractsWithTable;

    public string $active_tab = 'donations';

    public function table(Table $table): Table
    {
        $query = match ($this->active_tab) {
            'donations' => Donation::query(),
            'spendings' => Spending::query(),
            'appliances' => Appliance::query(),
            'supplies' => Supply::query(),
        };

        $active_table = match ($this->active_tab) {
            'donations' => DonationsTable::class,
            'spendings' => SpendingsTable::class,
            'appliances' => AppliancesTable::class,
            'supplies' => SuppliesTable::class,
        };

        return $table->query($query)->columns($active_table::configure(Table::make($this))->getColumns());
    }

    public function updatedActiveTab()
    {
        $this->resetTable();
    }
};
?>

<div class="mx-auto max-w-7xl p-8">
    <div class="pb-4">
        <x-filament::tabs class="w-fit">
            <x-filament::tabs.item :active="$active_tab === 'donations'" wire:click="$set('active_tab', 'donations')">
                Donations
            </x-filament::tabs.item>

            <x-filament::tabs.item :active="$active_tab === 'spendings'" wire:click="$set('active_tab', 'spendings')">
                Spending
            </x-filament::tabs.item>

            <x-filament::tabs.item :active="$active_tab === 'appliances'" wire:click="$set('active_tab', 'appliances')">
                Appliances
            </x-filament::tabs.item>

            <x-filament::tabs.item :active="$active_tab === 'supplies'" wire:click="$set('active_tab', 'supplies')">
                Supplies
            </x-filament::tabs.item>
        </x-filament::tabs>
    </div>

    <div wire:loading.remove wire:target="active_tab">
        {{ $this->table }}
    </div>

    <div class="items-center justify-center" wire:loading.flex wire:target="active_tab">
        <x-filament::loading-indicator class="h-96" />
    </div>
</div>
