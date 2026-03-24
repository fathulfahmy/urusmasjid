<?php

namespace App\Livewire;

use App\Models\Appliance;
use App\Models\Donation;
use App\Models\Mosque;
use App\Models\Spending;
use App\Models\Supply;
use App\Filament\Resources\Donations\Tables\DonationsTable;
use App\Filament\Resources\Donations\Schemas\DonationInfolist;
use App\Filament\Resources\Spendings\Tables\SpendingsTable;
use App\Filament\Resources\Spendings\Schemas\SpendingInfolist;
use App\Filament\Resources\Appliances\Tables\AppliancesTable;
use App\Filament\Resources\Appliances\Schemas\ApplianceInfolist;
use App\Filament\Resources\Supplies\Tables\SuppliesTable;
use App\Filament\Resources\Supplies\Schemas\SupplyInfolist;
use Filament\Actions\ViewAction;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Schema;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

new #[Title('Report')] class extends Component implements HasActions, HasSchemas, HasTable {
    use InteractsWithActions;
    use InteractsWithSchemas;
    use InteractsWithTable;

    #[Url(as: 'q', keep: true)]
    public string $param = 'donations';

    #[Computed]
    public function mosque()
    {
        return Mosque::latest()->first();
    }

    public function mount()
    {
        if (!in_array($this->param, ['donations', 'spendings', 'appliances', 'supplies'])) {
            abort(404);
        }
    }

    public function setTab(string $tab)
    {
        return $this->redirect(route('report', ['q' => $tab]), navigate: true);
    }

    public function table(Table $table): Table
    {
        $query = match ($this->param) {
            'spendings' => Spending::query(),
            'appliances' => Appliance::query(),
            'supplies' => Supply::query(),
            default => Donation::query(),
        };

        $paramle = match ($this->param) {
            'spendings' => SpendingsTable::class,
            'appliances' => AppliancesTable::class,
            'supplies' => SuppliesTable::class,
            default => DonationsTable::class,
        };

        return $paramle
            ::configure($table)
            ->query($query)
            ->recordActions([
                ViewAction::make()
                    ->infolist(
                        fn() => match ($this->param) {
                            'spendings' => SpendingInfolist::configure(Schema::make())->getComponents(),
                            'appliances' => ApplianceInfolist::configure(Schema::make())->getComponents(),
                            'supplies' => SupplyInfolist::configure(Schema::make())->getComponents(),
                            default => DonationInfolist::configure(Schema::make())->getComponents(),
                        },
                    )
                    ->modalSubmitAction(false),
            ])
            ->filters([])
            ->headerActions([])
            ->bulkActions([])
            ->toolbarActions([]);
    }
};
?>

<div class="mx-auto max-w-7xl p-4 sm:p-6 lg:p-8">
    <div class="mx-auto mb-8 mt-16 max-w-lg text-center">
        @if ($this->mosque?->getFirstMediaUrl())
            <img class="mx-auto w-24 pb-4" src="{{ $this->mosque->getFirstMediaUrl() }}">
        @endif
        <h2 class="text-3xl/tight font-semibold text-zinc-900 sm:text-4xl dark:text-white">
            {{ $this->mosque?->name ?? 'Report' }}
        </h2>
    </div>

    <div class="pb-4">
        <x-filament::tabs class="w-fit">
            <x-filament::tabs.item :active="$param === 'donations'" wire:click="setTab('donations')">
                Donations
            </x-filament::tabs.item>

            <x-filament::tabs.item :active="$param === 'spendings'" wire:click="setTab('spendings')">
                Spendings
            </x-filament::tabs.item>

            <x-filament::tabs.item :active="$param === 'appliances'" wire:click="setTab('appliances')">
                Appliances
            </x-filament::tabs.item>

            <x-filament::tabs.item :active="$param === 'supplies'" wire:click="setTab('supplies')">
                Supplies
            </x-filament::tabs.item>
        </x-filament::tabs>
    </div>

    <div>
        {{ $this->table }}
    </div>
</div>
