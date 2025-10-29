<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Local;
use App\Models\Cliente;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function listar(Request $request)
    {
        $eventos = Evento::with(['local', 'cliente'])->orderBy('data')->get();
        return view('evento', compact('eventos'));
    }

    public function cadastrar($id = null)
    {
        $evento = $id ? Evento::find($id) : null;
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
        ]);

        if ($id) {
            $evento = Evento::find($id);
            if (! $evento) {
                return redirect()->route('evento.listar')->with('error', 'Evento não encontrado.');
            }
            $evento->update($validated);
            $msg = 'Evento atualizado com sucesso.';
        } else {
            Evento::create($validated);
            $msg = 'Evento criado com sucesso.';
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
