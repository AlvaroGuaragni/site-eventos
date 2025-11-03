<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Servico;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {
        // Gráfico 1: Serviços por Fornecedor
        $servicosPorFornecedor = Servico::selectRaw('COALESCE(fornecedores.nome, "Sem Fornecedor") as fornecedor, COUNT(servicos.id) as total')
            ->leftJoin('fornecedores', 'servicos.fornecedor_id', '=', 'fornecedores.id')
            ->groupBy('fornecedores.id', 'fornecedores.nome')
            ->orderBy('total', 'desc')
            ->get();

        $chartServicos = (new LarapexChart)
            ->setType('bar')
            ->setTitle('Serviços por Fornecedor')
            ->setXAxis($servicosPorFornecedor->pluck('fornecedor')->toArray())
            ->setDataset([
                [
                    'name' => 'Quantidade de Serviços',
                    'data' => $servicosPorFornecedor->pluck('total')->toArray()
                ]
            ])
            ->setColors(['#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8']);

        // Gráfico 2: Eventos por Tipo
        $eventosPorTipo = Evento::selectRaw('tipo, COUNT(*) as total')
            ->groupBy('tipo')
            ->orderBy('total', 'desc')
            ->get();

        $chartEventos = (new LarapexChart)
            ->setType('pie')
            ->setTitle('Eventos por Tipo')
            ->setLabels($eventosPorTipo->pluck('tipo')->toArray())
            ->setDataset([
                [
                    'name' => 'Quantidade',
                    'data' => $eventosPorTipo->pluck('total')->toArray()
                ]
            ])
            ->setColors(['#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1']);

        return view('dashboard', compact('chartServicos', 'chartEventos'));
    }
}

