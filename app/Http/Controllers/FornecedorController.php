<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class FornecedorController extends Controller
{

    public function index()
    {
        return $this->listar();
    }

    public function listar()
    {
        $fornecedores = Fornecedor::orderBy('nome')->get();
        return view('fornecedores')->with('fornecedores', $fornecedores);
    }


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


    public function edit($id)
    {
        return $this->editar($id);
    }


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
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $fornecedor = $id ? Fornecedor::findOrFail($id) : new Fornecedor();
        $fornecedor->fill($validated);

        if ($request->hasFile('logo')) {
            if ($fornecedor->exists && $fornecedor->logo_path && Storage::disk('public')->exists($fornecedor->logo_path)) {
                Storage::disk('public')->delete($fornecedor->logo_path);
            }
            $path = $request->file('logo')->store('fornecedores', 'public');
            $fornecedor->logo_path = $path;
        }

        $fornecedor->save();

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor salvo com sucesso!');
    }


    public function update(Request $request, $id)
    {
        return $this->salvar($request, $id);
    }


    public function destroy($id)
    {
        $fornecedor = Fornecedor::find($id);
        if (! $fornecedor) {
            return redirect()->route('fornecedores.index')->with('error', 'Fornecedor não encontrado.');
        }
        if ($fornecedor->logo_path && Storage::disk('public')->exists($fornecedor->logo_path)) {
            Storage::disk('public')->delete($fornecedor->logo_path);
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


    public function show($id)
    {
        return redirect()->route('fornecedores.edit', $id);
    }

    public function pdf()
    {
        try {
            $fornecedores = Fornecedor::orderBy('nome')->get();
            $pdf = Pdf::loadView('pdf.fornecedores', compact('fornecedores'));
            return $pdf->download('relatorio-fornecedores.pdf');
        } catch (\Throwable $e) {
            \Log::error('Erro ao gerar PDF de fornecedores: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response('Falha ao gerar o PDF de fornecedores: '.$e->getMessage(), 500);
        }
    }
}


