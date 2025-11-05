<?php

namespace App\Http\Controllers;

use App\Charts\ClientesPorGeneroChart;
use App\Charts\EventosPorMesChart;

class DashboardController extends Controller
{
    public function index(EventosPorMesChart $eventosChart, ClientesPorGeneroChart $clientesChart)
    {
        $chartEventos = $eventosChart->build();
        $chartClientes = $clientesChart->build();

        return view('dashboard', [
            'chartEventos' => $chartEventos,
            'chartClientes' => $chartClientes,
        ]);
    }
}
