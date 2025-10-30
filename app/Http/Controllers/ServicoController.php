<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    // Resource: GET /servicos
    public function index()
    {
        return $this->listar();
    }

    public function listar()
    {
        $servicos = Servico::orderBy('nome')->get();
        return view('servicos')->with('servicos', $servicos);
    }

    // Resource: GET /servicos/create
    public function create()
    {
        return $this->cadastrar();
    }

    public function cadastrar()
    {
        return view('servicoCadastrar');
    }

    public function editar($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicoEditar')->with('servico', $servico);
    }

    // Resource: POST /servicos
    public function store(Request $request)
    {
        return $this->salvar($request);
    }

    public function salvar(Request $request, $id = null)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:150',
            'preco' => 'required|numeric|min:0',
            'categoria' => 'nullable|string|max:100',
            'descricao' => 'nullable|string',
        ]);

        $servico = $id ? Servico::findOrFail($id) : new Servico();
        $servico->fill($validated)->save();

        return redirect()->route('servicos.index')->with('success', 'Serviço salvo com sucesso!');
    }

    // Resource: PUT/PATCH /servicos/{id}
    public function update(Request $request, $id)
    {
        return $this->salvar($request, $id);
    }

    // Resource: DELETE /servicos/{id}
    public function destroy($id)
    {
        $servico = Servico::find($id);
        if (! $servico) {
            return redirect()->route('servicos.index')->with('error', 'Serviço não encontrado.');
        }
        $servico->delete();
        return redirect()->route('servicos.index')->with('success', 'Serviço excluído.');
    }

    public function buscar(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Servico::where($request->tipo, 'like', "%$request->valor%")
                ->orderBy('nome')
                ->get();
        } else {
            $dados = Servico::orderBy('nome')->get();
        }
        return view('servicos', ["servicos" => $dados]);
    }

    // Resource: GET /servicos/{id}
    public function show($id)
    {
        return redirect()->route('servicos.edit', $id);
    }
}


