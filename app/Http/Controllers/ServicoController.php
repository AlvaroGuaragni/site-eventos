<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ServicoController extends Controller
{
    // Resource: GET /servicos
    public function index()
    {
        return $this->listar();
    }

    public function listar()
    {
        $servicos = Servico::with('fornecedor')->orderBy('nome')->get();
        return view('servicos')->with('servicos', $servicos);
    }

    // Resource: GET /servicos/create
    public function create()
    {
        return $this->cadastrar();
    }

    public function cadastrar()
    {
        $fornecedores = Fornecedor::orderBy('nome')->get();
        return view('servicoCadastrar')->with('fornecedores', $fornecedores);
    }

    public function editar($id)
    {
        $servico = Servico::findOrFail($id);
        $fornecedores = Fornecedor::orderBy('nome')->get();
        return view('servicoEditar')->with(compact('servico','fornecedores'));
    }

    // Resource: GET /servicos/{id}/edit
    public function edit($id)
    {
        return $this->editar($id);
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
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'fornecedor_id' => 'nullable|exists:fornecedores,id',
        ]);

        $servico = $id ? Servico::findOrFail($id) : new Servico();
        $servico->fill($validated);

        if ($request->hasFile('imagem')) {
            if ($servico->exists && $servico->imagem_path && Storage::disk('public')->exists($servico->imagem_path)) {
                Storage::disk('public')->delete($servico->imagem_path);
            }
            $path = $request->file('imagem')->store('servicos', 'public');
            $servico->imagem_path = $path;
        }

        $servico->save();

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
        if ($servico->imagem_path && Storage::disk('public')->exists($servico->imagem_path)) {
            Storage::disk('public')->delete($servico->imagem_path);
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

    public function pdf()
    {
        try {
            $servicos = Servico::with('fornecedor')->orderBy('nome')->get();
            $pdf = Pdf::loadView('pdf.servicos', compact('servicos'));
            return $pdf->download('relatorio-servicos.pdf');
        } catch (\Throwable $e) {
            \Log::error('Erro ao gerar PDF de serviços: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response('Falha ao gerar o PDF de serviços: '.$e->getMessage(), 500);
        }
    }
}


