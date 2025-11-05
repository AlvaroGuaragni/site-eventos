<?php

namespace App\Charts;

use App\Models\Cliente;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class ClientesPorGeneroChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $rows = Cliente::query()
            ->select(DB::raw("COALESCE(NULLIF(TRIM(genero), ''), 'Não informado') as genero"), DB::raw('COUNT(*) as total'))
            ->groupBy('genero')
            ->orderByDesc('total')
            ->get();

        $labels = $rows->pluck('genero')->all();
        $data = $rows->pluck('total')->map(fn($v) => (int) $v)->all();

        if (empty($labels)) {
            $labels = ['Sem dados'];
            $data = [0];
        }

        return $this->chart->pieChart()
            ->addData($data)
            ->setLabels($labels);
    }
}

