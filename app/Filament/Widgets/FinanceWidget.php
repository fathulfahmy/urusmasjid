<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use App\Models\Spending;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;

class FinanceWidget extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    public function getColumns(): int|array
    {
        return 2;
    }

    protected function getStats(): array
    {
        $start_date = $this->pageFilters['start_date'] ?? null;
        $end_date = $this->pageFilters['end_date'] ?? null;

        $donations_amount = Donation::query()
            ->when($start_date, fn(Builder $query) => $query->whereDate('donated_at', '>=', $start_date))
            ->when($end_date, fn(Builder $query) => $query->whereDate('donated_at', '<=', $end_date))
            ->sum('amount');

        $spending_amount = Spending::query()
            ->when($start_date, fn(Builder $query) => $query->whereDate('spent_at', '>=', $start_date))
            ->when($end_date, fn(Builder $query) => $query->whereDate('spent_at', '<=', $end_date))
            ->sum('amount');

        return [
            Stat::make('Donations', number_format($donations_amount, 2)),
            Stat::make('Spendings', number_format($spending_amount, 2)),
        ];
    }
}
