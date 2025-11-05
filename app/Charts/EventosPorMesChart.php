<?php

namespace App\Charts;

use App\Models\Evento;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class EventosPorMesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $labels = [];
        $dataCounts = [];

        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $start = $month->copy()->startOfMonth()->toDateString();
            $end = $month->copy()->endOfMonth()->toDateString();

            $count = Evento::query()
                ->where(function ($q) use ($start, $end) {
                    $q->whereBetween('data', [$start, $end])
                      ->orWhereBetween('created_at', [$start, $end]);
                })
                ->count();

            $labels[] = $month->format('m/Y');
            $dataCounts[] = $count;
        }

        return $this->chart->barChart()
            ->setTitle('(últimos 12)')
            ->addData('Eventos', $dataCounts)
            ->setXAxis($labels);
    }
}

