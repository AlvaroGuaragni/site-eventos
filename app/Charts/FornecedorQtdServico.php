<?php

namespace App\Charts;

use App\Models\Fornecedor;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class FornecedorQtdServico
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $rows = Fornecedor::query()
            ->select('fornecedores.nome', DB::raw('COUNT(servicos.id) as total'))
            ->leftJoin('servicos', 'fornecedores.id', '=', 'servicos.fornecedor_id')
            ->groupBy('fornecedores.id', 'fornecedores.nome')
            ->orderByDesc('total')
            ->get();

        $labels = $rows->pluck('nome')->all();
        $data = $rows->pluck('total')->map(fn($v) => (int) $v)->all();

        if (empty($labels)) {
            $labels = ['Sem dados'];
            $data = [0];
        }

        return $this->chart->barChart()
            ->setTitle('Quantidade de Serviços por Fornecedor')
            ->addData('Serviços', $data)
            ->setXAxis($labels);
    }
}

