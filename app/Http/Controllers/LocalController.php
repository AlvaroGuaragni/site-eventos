<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function listar()
    {
        $locais = Local::orderBy('local')->get();
        return view('locais')->with('locais', $locais);
    }

    public function cadastrar()
    {
        return view('localCadastrar');
    }

    public function editar($id)
    {
        $local = Local::findOrFail($id);
        return view('localEditar')->with('local', $local);
    }

    public function  destroy ($id){
        $local = Local::find($id);

        if(empty($local)){
            return "<h2>Erro ao consultar o id informado</h2>";
        }
        $local->delete();
        return redirect()->route('local.listar')->with('success', 'Local deletado com sucesso!');
    }
    
    public function salvar(Request $request, $id = null)
    {
        if ($id) {
  
            $local = Local::findOrFail($id);
        } else {
       
            $local = new Local();
        }

        $local->local = $request->input('local');
        $local->capacidade = $request->input('capacidade');
        $local->endereco = $request->input('endereco');
        $local->save();

        return redirect()->route('local.listar');
    }

    public function buscar(Request $request)
    {
    if (!empty($request->valor)) {
        $dados = Local::where(
            $request->tipo,
            'like',
            "%$request->valor%"
        )->get();
    } else {
        $dados = Local::all();
    }

    return view('locais', ["locais" => $dados]);
    }

    
}