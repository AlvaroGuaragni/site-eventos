<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    // Resource: GET /fornecedores
    public function index()
    {
        return $this->listar();
    }

    public function listar()
    {
        $fornecedores = Fornecedor::orderBy('nome')->get();
        return view('fornecedores')->with('fornecedores', $fornecedores);
    }

    // Resource: GET /fornecedores/create
    public function create()
    {
        return $this->cadastrar();
    }

    public function cadastrar()
    {
        return view('fornecedorCadastrar');
    }

    public function editar($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedorEditar')->with('fornecedor', $fornecedor);
    }

    // Resource: POST /fornecedores
    public function store(Request $request)
    {
        return $this->salvar($request);
    }

    public function salvar(Request $request, $id = null)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:150',
            'telefone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'cnpj' => 'nullable|string|max:30',
        ]);

        $fornecedor = $id ? Fornecedor::findOrFail($id) : new Fornecedor();
        $fornecedor->fill($validated)->save();

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor salvo com sucesso!');
    }

    // Resource: PUT/PATCH /fornecedores/{id}
    public function update(Request $request, $id)
    {
        return $this->salvar($request, $id);
    }

    // Resource: DELETE /fornecedores/{id}
    public function destroy($id)
    {
        $fornecedor = Fornecedor::find($id);
        if (! $fornecedor) {
            return redirect()->route('fornecedores.index')->with('error', 'Fornecedor não encontrado.');
        }
        $fornecedor->delete();
        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor excluído.');
    }

    public function buscar(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Fornecedor::where($request->tipo, 'like', "%$request->valor%")
                ->orderBy('nome')
                ->get();
        } else {
            $dados = Fornecedor::orderBy('nome')->get();
        }
        return view('fornecedores', ["fornecedores" => $dados]);
    }

    // Resource: GET /fornecedores/{id}
    public function show($id)
    {
        return redirect()->route('fornecedores.edit', $id);
    }
}


