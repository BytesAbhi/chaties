<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\UserRegistration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRegistrationChart extends ChartWidget
{
    protected static ?string $heading = 'User Registrations (Last 7 Days)';

    protected function getData(): array
    {
        $data = UserRegistration::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as total')
            )
            ->where('created_at', '>=', now()->subDays(6)) // Last 7 days including today
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $dataset = [];

        foreach (range(0, 6) as $i) {
            $date = Carbon::today()->subDays(6 - $i)->toDateString();
            $labels[] = Carbon::parse($date)->format('d M');
            $dataset[] = $data[$date]->total ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Registrations',
                    'data' => $dataset,
                    'backgroundColor' => '#6366f1',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
