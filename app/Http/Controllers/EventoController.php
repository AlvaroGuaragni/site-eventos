<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Local;
use App\Models\Cliente;
use App\Models\Convidado;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function listar(Request $request)
    {
        $eventos = Evento::with(['local', 'cliente', 'convidados'])->orderBy('data')->get();
        return view('evento', compact('eventos'));
    }

    public function cadastrar($id = null)
    {
        $evento = $id ? Evento::with('convidados')->find($id) : null;
        $locais = Local::orderBy('local')->get();
        $clientes = Cliente::orderBy('nome')->get();

        return view('cadastrarEvento', compact('evento', 'locais', 'clientes'));
    }

    public function salvar(Request $request, $id = null)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:100',
            'local_id' => 'nullable|exists:locais,id',
            'cliente_id' => 'nullable|exists:clientes,id',
            'data' => 'required|date',
            'qtdPessoas' => 'required|string|max:100',
            'convidados' => 'nullable|array',
            'convidados.*' => 'nullable|string|max:255',
        ]);

        if ($id) {
            $evento = Evento::find($id);
            if (! $evento) {
                return redirect()->route('evento.listar')->with('error', 'Evento não encontrado.');
            }
            $evento->update($validated);
            $msg = 'Evento atualizado com sucesso.';
        } else {
            $evento = Evento::create($validated);
            $msg = 'Evento criado com sucesso.';
        }

        // Sincroniza convidados (remove vazios, recria tudo)
        $nomes = collect($request->input('convidados', []))
            ->map(fn($n) => trim((string)$n))
            ->filter(fn($n) => $n !== '');

        // Apaga existentes e recria (simples e eficaz)
        $evento->convidados()->delete();
        if ($nomes->isNotEmpty()) {
            $evento->convidados()->createMany(
                $nomes->map(fn($n) => ['nome' => $n])->all()
            );
        }

        return redirect()->route('evento.listar')->with('success', $msg);
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);
        if (! $evento) {
            return redirect()->route('evento.listar')->with('error', 'Evento não encontrado.');
        }
        $evento->delete();
        return redirect()->route('evento.listar')->with('success', 'Evento excluído.');
    }
    public function buscar(Request $request)
    {
    if (!empty($request->valor)) {
        $dados = Evento::where(
            $request->tipo,
            'like',
            "%$request->valor%"
        )->get();
    } else {
        $dados = Evento::all();
    }

    return view('evento', ["eventos" => $dados]);
    }
}