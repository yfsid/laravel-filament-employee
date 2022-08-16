<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $ID = Country::where('code', 'id')->withCount('employees')->first();
        $other = Country::where('code', '!==', 'id')->withCount('employees')->first();
        return [
            Card::make('All Employee', Employee::all()->count()),
            Card::make($ID->name . ' Employee', $ID->employees_count ?? 0),
            Card::make('Other Country Employee', $other->employees_count ?? 0),
        ];
    }
}
